<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?>
<?php echo $timezone_js;?></head>
<body onload="document.installform.setlogin.focus();">
<div style="margin-left:20px;">
<h1>Shaarli</h1>	
It looks like it's the first time you run Shaarli. Please configure it:<br>
<div style="color:white !important;">
<form method="POST" action="" name="installform" id="installform" style="border:1px solid black; padding:10 10 10 10;">
<table border="0" cellpadding="20">
<tr><td><b>Login:</b></td><td><input type="text" name="setlogin" size="30"></td></tr>
<tr><td><b>Password:</b></td><td><input type="password" name="setpassword" size="30"></td></tr>
<?php echo $timezone_html;?>

<tr><td><b>Page title:</b></td><td><input type="text" name="title" size="30"></td></tr>
<tr><td></td><td align="right"><input type="submit" name="Save" value="Save config" class="bigbutton"></td></tr>
</table>
</form>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>