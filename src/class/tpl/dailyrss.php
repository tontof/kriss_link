<?php $counter1=-1; if( isset($links) && is_array($links) && sizeof($links) ) foreach( $links as $key1 => $value1 ){ $counter1++; ?>

	<h3><a href="<?php echo $value1["url"];?>"><?php echo htmlspecialchars( $value1["title"] );?></a></h3>
	<small><?php if( !$GLOBALS['config']['HIDE_TIMESTAMPS'] ){ ?>
<?php echo htmlspecialchars( $value1["localdate"] );?> - <?php } ?>
<?php if( $value1["tags"] ){ ?>
<?php echo htmlspecialchars( $value1["tags"] );?>
<?php } ?><br>
	<?php echo htmlspecialchars( $value1["url"] );?></small><br>
	<?php if( $value1["thumbnail"] ){ ?>
<?php echo $value1["thumbnail"];?>
<?php } ?><br>
	<?php if( $value1["description"] ){ ?>
<?php echo $value1["formatedDescription"];?>
<?php } ?>

	<br><br><hr>
<?php } ?>