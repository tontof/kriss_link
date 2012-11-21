<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body onload="document.changetag.fromtag.focus();">
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<form method="POST" action="" name="changetag" id="changetag">
	<input type="hidden" name="token" value="<?php echo $token;?>">
	Tag: <input type="text" name="fromtag" id="fromtag">
	<input type="text" name="totag" style="margin-left:40px;"><input type="submit" name="renametag" value="Rename tag" class="bigbutton">
	&nbsp;&nbsp;or&nbsp; <input type="submit" name="deletetag" value="Delete tag" class="bigbutton" onClick="return confirmDeleteTag();"><br>(Case sensitive)</form>
<script language="JavaScript">function confirmDeleteTag() { var agree=confirm("Are you sure you want to delete this tag from all links ?"); if (agree) return true ; else return false ; }</script>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>