<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?>

<script src="inc/jquery.lazyload.min.js"></script>
</head>
<body>
<div id="pageheader"><?php LinkPage::pageheaderTpl(); ?></div>
<center>
<div class="picwall_container">
    <?php $counter1=-1; if( isset($linksToDisplay) && is_array($linksToDisplay) && sizeof($linksToDisplay) ) foreach( $linksToDisplay as $key1 => $value1 ){ $counter1++; ?>

    <div class="picwall_pictureframe">
	    <?php echo $value1["thumbnail"];?><a href="<?php echo $value1["permalink"];?>"><span class="info"><?php echo htmlspecialchars( $value1["title"] );?></span></a>
    </div>
    <?php } ?>

</div>
</center>
<?php LinkPage::pagefooterTpl(); ?>

</body>
<script>
$(document).ready(function() {
    $("img.lazyimage").show().lazyload();
});
</script>
</html>