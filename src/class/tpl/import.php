<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body onload="document.uploadform.filetoupload.focus();">
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<div id="uploaddiv">
	Import Netscape html bookmarks (as exported from Firefox/Chrome/Opera/delicious/diigo...) (Max: <?php echo htmlspecialchars( $maxfilesize );?> bytes).
	<form method="POST" action="?do=upload" enctype="multipart/form-data" name="uploadform" id="uploadform">
	    <input type="hidden" name="token" value="<?php echo $token;?>">
	    <input type="file" name="filetoupload" size="80">
	    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo htmlspecialchars( $maxfilesize );?>">
	    <input type="submit" name="import_file" value="Import" class="bigbutton"><br>
	    <input type="checkbox" name="private" id="private"><label for="private">&nbsp;Import all links as private</label><br>
	    <input type="checkbox" name="overwrite" id="overwrite"><label for="overwrite">&nbsp;Overwrite existing links</label>
	</form>
	</div>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>