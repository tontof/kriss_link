<?php 
class LinkPage
{
    public static $var = array();
    private static $_instance;

    /**
     * initialize private instance of LinkPage class
     */
    public static function init($var)
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new LinkPage();
            LinkPage::$var = $var;
        }
    }

 public static function addlinkTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/addlink.php"); ?>
<?php
 }

 public static function changepasswordTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/changepassword.php"); ?>
<?php
 }

 public static function changetagTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/changetag.php"); ?>
<?php
 }

 public static function configureTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/configure.php"); ?>
<?php
 }

 public static function dailyTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/daily.php"); ?>
<?php
 }

 public static function dailyrssTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/dailyrss.php"); ?>
<?php
 }

 public static function editlinkTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/editlink.php"); ?>
<?php
 }

 public static function exportTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/export.php"); ?>
<?php
 }

 public static function importTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/import.php"); ?>
<?php
 }

 public static function includesTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/includes.php"); ?>
<?php
 }

 public static function installTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/install.php"); ?>
<?php
 }

 public static function linklistpagingTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/linklist.paging.php"); ?>
<?php
 }

 public static function linklistTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/linklist.php"); ?>
<?php
 }

 public static function loginformTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/loginform.php"); ?>
<?php
 }

 public static function pagefooterTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/page.footer.php"); ?>
<?php
 }

 public static function pageheaderTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/page.header.php"); ?>
<?php
 }

 public static function picwallTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/picwall.php"); ?>
<?php
 }

 public static function tagcloudTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/tagcloud.php"); ?>
<?php
 }

 public static function toolsTpl()
 {
 extract(LinkPage::$var);
?>
<?php include("tpl/tools.php"); ?>
<?php
 }

}
