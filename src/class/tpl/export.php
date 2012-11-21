<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body>
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<div id="toolsdiv">
	    <a href="?do=export&what=all"><b>Export all</b> <span>: Export all links</span></a><br><br>
	    <a href="?do=export&what=public"><b>Export public</b> <span>: Export public links only</a><br><br>
	    <a href="?do=export&what=private"><b>Export private</b> <span>: Export private links only</a><br><br style="clear:both;">
	</div>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>