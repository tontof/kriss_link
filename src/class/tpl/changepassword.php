<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body onload="document.changepasswordform.oldpassword.focus();">
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<form method="POST" action="" name="changepasswordform" id="changepasswordform">
	Old password: <input type="password" name="oldpassword">&nbsp; &nbsp;
	New password: <input type="password" name="setpassword">
	<input type="hidden" name="token" value="<?php echo $token;?>">
	<input type="submit" name="Save" value="Save password" class="bigbutton"></form>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>