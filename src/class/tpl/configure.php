<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body onload="document.configform.title.focus();">
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

<?php echo $timezone_js;?>

    <form method="POST" action="" name="configform" id="configform">
	<input type="hidden" name="token" value="<?php echo $token;?>">
	<table border="0" cellpadding="20">
	  <tr><td><b>Page title:</b></td><td><input type="text" name="title" id="title" size="50" value="<?php echo $title;?>"></td></tr>
	  <tr><td valign="top"><b>Timezone:</b></td><td><?php echo $timezone_form;?></td></tr>
	  <tr><td valign="top"><b>Redirector</b></td><td><input type="text" name="redirector" id="redirector" size="50" value="<?php echo $redirector;?>"><br>(e.g. <i>http://anonym.to/?</i> will mask the HTTP_REFERER)</td></tr>
      <tr> <td valign="top">Security:</td> <td><input type="checkbox" name="disablesessionprotection" id="disablesessionprotection" <?php if( !empty($GLOBALS['disablesessionprotection']) ){ ?>checked<?php } ?>><label for="disablesessionprotection">&nbsp;Disable session cookie hijacking protection (Check this if you get disconnected often or if your IP address changes often.)</label></td></tr>
	  <tr><td></td><td align="right"><input type="submit" name="Save" value="Save config" class="bigbutton"></td></tr>
	</table>
	</form>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>