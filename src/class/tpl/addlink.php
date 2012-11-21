<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body onload="document.addform.post.focus();">
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<div id="headerform">
		<form method="GET" action="" name="addform" class="addform">
			<input type="text" name="post" style="width:50%;"> 
			<input type="submit" value="Add link" class="bigbutton">
		</form>
	</div>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>