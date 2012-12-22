<?php
// -----------------------------------------------------------------------------------------------
// Simple cache system (mainly for the RSS/ATOM feeds).

class pageCache
{
    private $url; // Full URL of the page to cache (typically the value returned by pageUrl())
    private $shouldBeCached; // boolean: Should this url be cached ?
    private $filename; // Name of the cache file for this url

    /* 
         $url = url (typically the value returned by pageUrl())
         $shouldBeCached = boolean. If false, the cache will be disabled.
    */
    public function __construct($url,$shouldBeCached)
    {
        $this->url = $url;
        $this->filename = $GLOBALS['config']['PAGECACHE'].'/'.sha1($url).'.cache';
        $this->shouldBeCached = $shouldBeCached;
    } 

    // If the page should be cached and a cached version exists,
    // returns the cached version (otherwise, return null).
    public function cachedVersion()
    {
        if (!$this->shouldBeCached) return null;
        if (is_file($this->filename)) { return file_get_contents($this->filename); exit; }
        return null;
    }

    // Put a page in the cache.
    public function cache($page)
    {
        if (!$this->shouldBeCached) return;
        if (!is_dir($GLOBALS['config']['PAGECACHE'])) { mkdir($GLOBALS['config']['PAGECACHE'],0705); chmod($GLOBALS['config']['PAGECACHE'],0705); }
        file_put_contents($this->filename,$page);
    }

    // Purge the whole cache.
    // (call with pageCache::purgeCache())
    public static function purgeCache()
    {
        if (is_dir($GLOBALS['config']['PAGECACHE']))
        {
            $handler = opendir($GLOBALS['config']['PAGECACHE']);
            if ($handler!==false)
            {
                while (($filename = readdir($handler))!==false) 
                {
                    if (endsWith($filename,'.cache')) { unlink($GLOBALS['config']['PAGECACHE'].'/'.$filename); }
                }
                closedir($handler);
            }
        }
    }

}
