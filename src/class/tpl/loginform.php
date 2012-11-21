<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body<?php if( ban_canLogin() ){ ?> onload="document.loginform.login.focus();"<?php } ?>>
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>


	<div id="headerform">
<?php if( !ban_canLogin() ){ ?>

    You have been banned from login after too many failed attempts. Try later.
<?php }else{ ?>

    <form method="post" name="loginform">
    Login: <input type="text" name="login" tabindex="1">&nbsp;&nbsp;&nbsp;
    Password : <input type="password" name="password" tabindex="2">
    <input type="submit" value="Login" class="bigbutton" tabindex="4"><br>
    <input style="margin:10 0 0 40;" type="checkbox" name="longlastingsession" id="longlastingsession"  tabindex="3"><label for="longlastingsession">&nbsp;Stay signed in (Do not check on public computers)</label>
    <input type="hidden" name="token" value="<?php echo $token;?>">
    <?php if( $returnurl ){ ?><input type="hidden" name="returnurl" value="<?php echo htmlspecialchars( $returnurl );?>"><?php } ?>

    </form>
<?php } ?>

    </div>
</div>

<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>