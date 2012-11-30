<?php
// ------------------------------------------------------------------------------------------
/* This class is in charge of building the final page.
   (This is basically a wrapper around RainTPL which pre-fills some fields.)
   p = new pageBuilder;
   p.assign('myfield','myvalue');
   p.renderPage('mytemplate');
   
*/
class pageBuilder
{
    private $tpl; // RainTPL template

    public $var = array();

    function __construct()
    {
        $this->tpl=false;
    } 

    private function initialize()
    {    
        $this->tpl = true;    
        $this->assign('newversion',checkUpdate());
        $this->assign('feedurl',htmlspecialchars(indexUrl()));
        $searchcrits=''; // Search criteria
        if (!empty($_GET['searchtags'])) $searchcrits.='&searchtags='.urlencode($_GET['searchtags']);
        elseif (!empty($_GET['searchterm'])) $searchcrits.='&searchterm='.urlencode($_GET['searchterm']);
        $this->assign('searchcrits',$searchcrits);
        $this->assign('source',indexUrl());
        $this->assign('version',LINK_VERSION);
        $this->assign('scripturl',indexUrl());
        $this->assign('pagetitle','KrISS link');
        $this->assign('privateonly',!empty($_SESSION['privateonly'])); // Show only private links ?
        if (!empty($GLOBALS['title'])) $this->assign('pagetitle',$GLOBALS['title']);
        if (!empty($GLOBALS['pagetitle'])) $this->assign('pagetitle',$GLOBALS['pagetitle']);
        $this->assign('shaarlititle',empty($GLOBALS['title']) ? 'KrISS link': $GLOBALS['title'] );
        return;    
    }
    
    // The following assign() method is basically the same as RainTPL (except that it's lazy)
    public function assign($variable, $value = null)
    {
        if ($this->tpl===false) $this->initialize(); // Lazy initialization
		if( is_array( $variable ) )
			$this->var += $variable;
		else
			$this->var[ $variable ] = $value;
    }

    // Render a specific page (using a template).
    // eg. pb.renderPage('picwall')
    public function renderPage($page)
    {
        if ($this->tpl===false) $this->initialize(); // Lazy initialization
        $method = $page.'Tpl';
        if (method_exists('LinkPage', $method)) {
            LinkPage::init($this->var);
            ob_start();
            LinkPage::$method();
            ob_end_flush();
        } else {
            print_r($page);
        }
    }
}
