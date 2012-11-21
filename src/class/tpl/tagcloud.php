<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body>
	<div id="pageheader"><?php LinkPage::pageheaderTpl(); ?></div>
<center>
<div id="cloudtag">
    <?php $counter1=-1; if( isset($tags) && is_array($tags) && sizeof($tags) ) foreach( $tags as $key1 => $value1 ){ $counter1++; ?>

    <span style="color:#99f; font-size:9pt; padding-left:5px; padding-right:2px;"><?php echo $value1["count"];?></span><a href="?searchtags=<?php echo htmlspecialchars( $key1 );?>" style="font-size:<?php echo $value1["size"];?>pt; font-weight:bold; color:black; text-decoration:none"><?php echo htmlspecialchars( $key1 );?></a>
    <?php } ?>

</div>
</center>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>