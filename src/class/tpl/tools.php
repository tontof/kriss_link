<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body>
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<div id="toolsdiv">
		<?php if( !$GLOBALS['config']['OPEN_SHAARLI'] ){ ?><a href="?do=changepasswd"><b>Change password</b>  <span>: Change your password.</span></a><br><br><?php } ?>

	    <a href="?do=configure"><b>Configure your Shaarli</b> <span>:  Change Title, timezone...</span></a><br><br>
	    <a href="?do=changetag"><b>Rename/delete tags</b> <span>:  Rename or delete a tag in all links</span></a><br><br>
	    <a href="?do=import"><b>Import</b> <span>:  Import Netscape html bookmarks (as exported from Firefox, Chrome, Opera, delicious...)</span></a> <br><br>
	    <a href="?do=export"><b>Export</b> <span>:  Export Netscape html bookmarks (which can be imported in Firefox, Chrome, Opera, delicious...)</span></a><br><br>
	<a class="smallbutton" onclick="alert('Drag this link to your bookmarks toolbar, or right-click it and choose Bookmark This Link...');return false;" href="javascript:javascript:(function(){var%20url%20=%20location.href;var%20title%20=%20document.title%20||%20url;window.open('<?php echo $pageabsaddr;?>?post='%20+%20encodeURIComponent(url)+'&amp;title='%20+%20encodeURIComponent(title)+'&amp;source=bookmarklet','_blank','menubar=no,height=390,width=600,toolbar=no,scrollbars=no,status=no,dialog=1');})();"><b>Shaare link</b></a> <a href="#" style="clear:none;"><span>&#x21D0; Drag this link to your bookmarks toolbar (or right-click it and choose Bookmark This Link....).<br>&nbsp;&nbsp;&nbsp;&nbsp;Then click "Shaare link" button in any page you want to share.</span></a><br><br>
	    <div class="clear"></div>
	</div>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>