<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body>
<div id="pageheader"><?php LinkPage::pageheaderTpl(); ?></div>
<div class="daily">
    <div class="dailyAbout">
      All links of one day<br>in a single page.<br>
	  <?php if( $previousday ){ ?> <a href="?do=daily&day=<?php echo $previousday;?>"><b>&lt;</b>Previous day</a><?php }else{ ?><b>&lt;</b>Previous day<?php } ?>

	  - 
	  <?php if( $nextday ){ ?><a href="?do=daily&day=<?php echo $nextday;?>">Next day<b>&gt;</b></a><?php }else{ ?>Next day<b>&gt;</b><?php } ?>

      <br><br>
	  <a href="?do=dailyrss" title="1 RSS entry per day"><img src="images/feed-icon-14x14.png" width="14" height="14" style="position:relative;top:3px; margin-right:4px;">Daily RSS Feed</a>
    </div>
    <div class="dailyTitle"><img src="tpl/../images/floral_left.png" width="51" height="50" class="nomobile"> The Daily Shaarli <img src="tpl/../images/floral_right.png" width="51" height="50" class="nomobile"></div>
    <div class="dailyDate"><span class="nomobile">&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;</span> <?php echo $day;?> <span class="nomobile">&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;&#x0097;</span></div>
    <div style="clear:both;"></div>
    
    <?php if( $linksToDisplay ){ ?>

        <div id="daily_col1">
        <?php $counter1=-1; if( isset($col1) && is_array($col1) && sizeof($col1) ) foreach( $col1 as $key1 => $value1 ){ $counter1++; ?>

        <div class="dailyEntry">
            <div style="float:right;position:relative;top:-1px;"><a href="?<?php echo smallHash( $value1["linkdate"] );?>"><img src="tpl/../images/squiggle2.png" width="25" height="26" title="permalink" alt="permalink"></a></div>
            <?php if( $value1["tags"] ){ ?><div class="dailyEntryTags"><?php $counter2=-1; if( isset($value1["taglist"]) && is_array($value1["taglist"]) && sizeof($value1["taglist"]) ) foreach( $value1["taglist"] as $key2 => $value2 ){ $counter2++; ?>
<?php echo htmlspecialchars( $value2 );?> - <?php } ?></div><?php } ?>

            <div class="dailyEntryTitle"><a href="<?php echo $value1["url"];?>"><?php echo htmlspecialchars( $value1["title"] );?></a></div>
            <?php if( $value1["thumbnail"] ){ ?><div class="dailyEntryThumbnail"><?php echo $value1["thumbnail"];?></div><?php } ?>

            <div class="dailyEntryDescription"><?php echo $value1["formatedDescription"];?></div>
        </div>
        <?php } ?>

        </div>

        <div id="daily_col2">
        <?php $counter1=-1; if( isset($col2) && is_array($col2) && sizeof($col2) ) foreach( $col2 as $key1 => $value1 ){ $counter1++; ?>

        <div class="dailyEntry">
            <div style="float:right;position:relative;top:-1px;"><a href="?<?php echo smallHash( $value1["linkdate"] );?>"><img src="tpl/../images/squiggle2.png" width="25" height="26" title="permalink" alt="permalink"></a></div>
            <?php if( $value1["tags"] ){ ?><div class="dailyEntryTags"><?php $counter2=-1; if( isset($value1["taglist"]) && is_array($value1["taglist"]) && sizeof($value1["taglist"]) ) foreach( $value1["taglist"] as $key2 => $value2 ){ $counter2++; ?>
<?php echo htmlspecialchars( $value2 );?> - <?php } ?></div><?php } ?>

            <div class="dailyEntryTitle"><a href="<?php echo $value1["url"];?>"><?php echo htmlspecialchars( $value1["title"] );?></a></div>
            <?php if( $value1["thumbnail"] ){ ?><div class="dailyEntryThumbnail"><?php echo $value1["thumbnail"];?></div><?php } ?>

            <div class="dailyEntryDescription"><?php echo $value1["formatedDescription"];?></div>
        </div>
        <?php } ?>

        </div>    

        <div id="daily_col3">
        <?php $counter1=-1; if( isset($col3) && is_array($col3) && sizeof($col3) ) foreach( $col3 as $key1 => $value1 ){ $counter1++; ?>

        <div class="dailyEntry">
            <div style="float:right;position:relative;top:-1px;"><a href="?<?php echo smallHash( $value1["linkdate"] );?>"><img src="tpl/../images/squiggle2.png" width="25" height="26" title="permalink" alt="permalink"></a></div>
            <?php if( $value1["tags"] ){ ?><div class="dailyEntryTags"><?php $counter2=-1; if( isset($value1["taglist"]) && is_array($value1["taglist"]) && sizeof($value1["taglist"]) ) foreach( $value1["taglist"] as $key2 => $value2 ){ $counter2++; ?>
<?php echo htmlspecialchars( $value2 );?> - <?php } ?></div><?php } ?>

            <div class="dailyEntryTitle"><a href="<?php echo $value1["url"];?>"><?php echo htmlspecialchars( $value1["title"] );?></a></div>
            <?php if( $value1["thumbnail"] ){ ?><div class="dailyEntryThumbnail"><?php echo $value1["thumbnail"];?></div><?php } ?>

            <div class="dailyEntryDescription"><?php echo $value1["formatedDescription"];?></div>
        </div>
        <?php } ?>

        </div>        
    <?php }else{ ?>

         <div style="text-align:center; padding:40px 0px 90px 0px;">No articles on this day.</div>
    <?php } ?>

    <div style="clear:both;"></div>
    <div style="text-align:center; padding-bottom:20px;"><img src="tpl/../images/squiggle_closing.png" width="66" height="61" alt="-"></div>
</div>
<?php LinkPage::pagefooterTpl(); ?>

</body>
</html>