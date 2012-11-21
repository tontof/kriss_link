<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body 
<?php if( $link["title"]=='' ){ ?>onload="document.linkform.lf_title.focus();"
<?php }elseif( $link["description"]=='' ){ ?>onload="document.linkform.lf_description.focus();"
<?php }else{ ?>onload="document.linkform.lf_tags.focus();"<?php } ?> >
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<div id="editlinkform">
	    <form method="post" name="linkform">
	        <input type="hidden" name="lf_linkdate" value="<?php echo $link["linkdate"];?>">
	        <i>URL</i><br><input type="text" name="lf_url" value="<?php echo htmlspecialchars( $link["url"] );?>" style="width:100%"><br>
	        <i>Title</i><br><input type="text" name="lf_title" value="<?php echo htmlspecialchars( $link["title"] );?>" style="width:100%"><br>
	        <i>Description</i><br><textarea name="lf_description" rows="4" cols="25" style="width:100%"><?php echo htmlspecialchars( $link["description"] );?></textarea><br>
	        <i>Tags</i><br><input type="text" id="lf_tags" name="lf_tags" value="<?php echo htmlspecialchars( $link["tags"] );?>" style="width:100%"><br>
	        <input type="checkbox" <?php if( $link["private"]!=0 ){ ?>checked="yes"<?php } ?> style="margin:7 0 10 0;" name="lf_private" id="lf_private">&nbsp;<label for="lf_private"><i>Private</i></label><br>
	        <input type="submit" value="Save" name="save_edit" class="bigbutton" style="margin-left:40px;">
	        <input type="submit" value="Cancel" name="cancel_edit" class="bigbutton" style="margin-left:40px;">
	        <?php if( !$link_is_new ){ ?><input type="submit" value="Delete" name="delete_link" class="bigbutton" style="margin-left:180px;" onClick="return confirmDeleteLink();"><?php } ?>

	        <input type="hidden" name="token" value="<?php echo $token;?>">
	        <?php if( $http_referer ){ ?><input type="hidden" name="returnurl" value="<?php echo htmlspecialchars( $http_referer );?>"><?php } ?>

	    </form>
	</div>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>