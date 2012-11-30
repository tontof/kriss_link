<?php
// ------------------------------------------------------------------------------------------
/* Data storage for links.
   This object behaves like an associative array.
   Example:
      $mylinks = new linkdb();
      echo $mylinks['20110826_161819']['title'];
      foreach($mylinks as $link)
         echo $link['title'].' at url '.$link['url'].' ; description:'.$link['description'];
   
   Available keys:
       title : Title of the link
       url : URL of the link. Can be absolute or relative. Relative URLs are permalinks (eg.'?m-ukcw')
       description : description of the entry
       private : Is this link private ? 0=no, other value=yes
       linkdate : date of the creation of this entry, in the form YYYYMMDD_HHMMSS (eg.'20110914_192317')
       tags : tags attached to this entry (separated by spaces)                   

   We implement 3 interfaces:
     - ArrayAccess so that this object behaves like an associative array.
     - Iterator so that this object can be used in foreach() loops.
     - Countable interface so that we can do a count() on this object.
*/
class linkdb implements Iterator, Countable, ArrayAccess
{
    private $links; // List of links (associative array. Key=linkdate (eg. "20110823_124546"), value= associative array (keys:title,description...)
    private $urls;  // List of all recorded URLs (key=url, value=linkdate) for fast reserve search (url-->linkdate)
    private $keys;  // List of linkdate keys (for the Iterator interface implementation)
    private $position; // Position in the $this->keys array. (for the Iterator interface implementation.)
    private $loggedin; // Is the used logged in ? (used to filter private links)

    // Constructor:
    function __construct($isLoggedIn)
    // Input : $isLoggedIn : is the used logged in ?
    {
        $this->loggedin = $isLoggedIn;
        $this->checkdb(); // Make sure data file exists.
        $this->readdb();  // Then read it.
    }

    // ---- Countable interface implementation
    public function count() { return count($this->links); }

    // ---- ArrayAccess interface implementation
    public function offsetSet($offset, $value)
    {
        if (!$this->loggedin) die('You are not authorized to add a link.');
        if (empty($value['linkdate']) || empty($value['url'])) die('Internal Error: A link should always have a linkdate and url.');
        if (empty($offset)) die('You must specify a key.');
        $this->links[$offset] = $value;
        $this->urls[$value['url']]=$offset;
    }
    public function offsetExists($offset) { return array_key_exists($offset,$this->links); }
    public function offsetUnset($offset)
    {
        if (!$this->loggedin) die('You are not authorized to delete a link.');
        $url = $this->links[$offset]['url']; unset($this->urls[$url]);
        unset($this->links[$offset]);
    }
    public function offsetGet($offset) { return isset($this->links[$offset]) ? $this->links[$offset] : null; }

    // ---- Iterator interface implementation
    function rewind() { $this->keys=array_keys($this->links); rsort($this->keys); $this->position=0; } // Start over for iteration, ordered by date (latest first).
    function key() { return $this->keys[$this->position]; } // current key
    function current() { return $this->links[$this->keys[$this->position]]; } // current value
    function next() { ++$this->position; } // go to next item
    function valid() { return isset($this->keys[$this->position]); }    // Check if current position is valid.

    // ---- Misc methods
    private function checkdb() // Check if db directory and file exists.
    {
        if (!file_exists($GLOBALS['config']['DATASTORE'])) // Create a dummy database for example.
        {
             $this->links = array();
             $link = array('title'=>'Shaarli - sebsauvage.net','url'=>'http://sebsauvage.net/wiki/doku.php?id=php:shaarli','description'=>'Welcome to Shaarli ! This is a bookmark. To edit or delete me, you must first login.','private'=>0,'linkdate'=>'20110914_190000','tags'=>'opensource software');
             $this->links[$link['linkdate']] = $link;
             $link = array('title'=>'My secret stuff... - Pastebin.com','url'=>'http://pastebin.com/smCEEeSn','description'=>'SShhhh!!  I\'m a private link only YOU can see. You can delete me too.','private'=>1,'linkdate'=>'20110914_074522','tags'=>'secretstuff');
             $this->links[$link['linkdate']] = $link;
             $link = array('title'=>'KrISS link','url'=>'https://github.com/tontof/kriss_link','description'=>'Welcome to KrISS link, a simple and smart (or stupid) shaarli.','private'=>0,'linkdate'=>'20121130_190000','tags'=>'opensource software');
             $this->links[$link['linkdate']] = $link;
             file_put_contents($GLOBALS['config']['DATASTORE'], PHPPREFIX.base64_encode(gzdeflate(serialize($this->links))).PHPSUFFIX); // Write database to disk
        }
    }

    // Read database from disk to memory
    private function readdb()
    {
        // Read data
        $this->links=(file_exists($GLOBALS['config']['DATASTORE']) ? unserialize(gzinflate(base64_decode(substr(file_get_contents($GLOBALS['config']['DATASTORE']),strlen(PHPPREFIX),-strlen(PHPSUFFIX))))) : array() );
        // Note that gzinflate is faster than gzuncompress. See: http://www.php.net/manual/en/function.gzdeflate.php#96439

        // If user is not logged in, filter private links.
        if (!$this->loggedin)
        {
            $toremove=array();
            foreach($this->links as $link) { if ($link['private']!=0) $toremove[]=$link['linkdate']; }
            foreach($toremove as $linkdate) { unset($this->links[$linkdate]); }
        }

        // Keep the list of the mapping URLs-->linkdate up-to-date.
        $this->urls=array();
        foreach($this->links as $link) { $this->urls[$link['url']]=$link['linkdate']; }
    }

    // Save database from memory to disk.
    public function savedb()
    {
        if (!$this->loggedin) die('You are not authorized to change the database.');
        file_put_contents($GLOBALS['config']['DATASTORE'], PHPPREFIX.base64_encode(gzdeflate(serialize($this->links))).PHPSUFFIX);
        invalidateCaches();
    }

    // Returns the link for a given URL (if it exists). false it does not exist.
    public function getLinkFromUrl($url)
    {
        if (isset($this->urls[$url])) return $this->links[$this->urls[$url]];
        return false;
    }

    // Case insentitive search among links (in url, title and description). Returns filtered list of links.
    // eg. print_r($mydb->filterFulltext('hollandais'));
    public function filterFulltext($searchterms)
    {
        // FIXME: explode(' ',$searchterms) and perform a AND search.
        // FIXME: accept double-quotes to search for a string "as is" ?
        $filtered=array();
        $s = strtolower($searchterms);
        foreach($this->links as $l)
        {
            $found=   (strpos(strtolower($l['title']),$s)!==false)
                   || (strpos(strtolower($l['description']),$s)!==false)
                   || (strpos(strtolower($l['url']),$s)!==false)
                   || (strpos(strtolower($l['tags']),$s)!==false);
            if ($found) $filtered[$l['linkdate']] = $l;
        }
        krsort($filtered);
        return $filtered;
    }

    // Filter by tag.
    // You can specify one or more tags (tags can be separated by space or comma).
    // eg. print_r($mydb->filterTags('linux programming'));
    public function filterTags($tags,$casesensitive=false)
    {
        $t = str_replace(',',' ',($casesensitive?$tags:strtolower($tags)));
        $searchtags=explode(' ',$t);
        $filtered=array();
        foreach($this->links as $l)
        {
            $linktags = explode(' ',($casesensitive?$l['tags']:strtolower($l['tags'])));
            if (count(array_intersect($linktags,$searchtags)) == count($searchtags))
                $filtered[$l['linkdate']] = $l;
        }
        krsort($filtered);
        return $filtered;
    }

    // Filter by day. Day must be in the form 'YYYYMMDD' (eg. '20120125')
    // Sort order is: older articles first.
    // eg. print_r($mydb->filterDay('20120125'));
    public function filterDay($day)
    {
        $filtered=array();
        foreach($this->links as $l)
        {
            if (startsWith($l['linkdate'],$day)) $filtered[$l['linkdate']] = $l;
        }
        ksort($filtered);
        return $filtered;
    }
    // Filter by smallHash.
    // Only 1 article is returned.
    public function filterSmallHash($smallHash)
    {
        $filtered=array();
        foreach($this->links as $l)
        {
            if ($smallHash==smallHash($l['linkdate'])) // Yes, this is ugly and slow
            {
                $filtered[$l['linkdate']] = $l;
                return $filtered;
            }
        }
        return $filtered;
    }

    // Returns the list of all tags
    // Output: associative array key=tags, value=0
    public function allTags()
    {
        $tags=array();
        foreach($this->links as $link)
            foreach(explode(' ',$link['tags']) as $tag)
                if (!empty($tag)) $tags[$tag]=(empty($tags[$tag]) ? 1 : $tags[$tag]+1);
        arsort($tags); // Sort tags by usage (most used tag first)
        return $tags;
    }
    
    // Returns the list of days containing articles (oldest first)
    // Output: An array containing days (in format YYYYMMDD).
    public function days()
    {
        $linkdays=array();
        foreach(array_keys($this->links) as $day)
        {
            $linkdays[substr($day,0,8)]=0;
        }
        $linkdays=array_keys($linkdays);
        sort($linkdays);
        return $linkdays;
    }
}
