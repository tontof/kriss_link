<!DOCTYPE html>
<html>
<head><?php LinkPage::includesTpl(); ?></head>
<body>
<div id="pageheader">
	<?php LinkPage::pageheaderTpl(); ?>

	<div id="headerform" style="width:100%; white-space:nowrap;">
	    <form method="GET" class="searchform" name="searchform" style="display:inline;"><input type="text" id="searchform_value" name="searchterm" style="width:30%" value=""> <input type="submit" value="Search" class="bigbutton"></form>
	    <form method="GET" class="tagfilter" name="tagfilter" style="display:inline;margin-left:24px;"><input type="text" name="searchtags" id="tagfilter_value" style="width:10%" value=""> <input type="submit" value="Filter by tag" class="bigbutton"></form>
	</div>
</div>

<div id="linklist">

    <?php LinkPage::linklistpagingTpl(); ?>


    <?php if( count($links)==0 ){ ?>

        <div id="searchcriteria">Nothing found.</i></div>
    <?php }else{ ?>

        <?php if( $search_type=='fulltext' ){ ?>

            <div id="searchcriteria"><?php echo $result_count;?> results for <i><?php echo $search_crits;?></i></div>
        <?php } ?>

        <?php if( $search_type=='tags' ){ ?>

            <div id="searchcriteria"><?php echo $result_count;?> results for tags <i>
            <?php $counter1=-1; if( isset($search_crits) && is_array($search_crits) && sizeof($search_crits) ) foreach( $search_crits as $key1 => $value1 ){ $counter1++; ?>

                <span class="linktag" title="Remove tag"><a href="?removetag=<?php echo htmlspecialchars( $value1 );?>"><?php echo htmlspecialchars( $value1 );?> <span style="border-left:1px solid #aaa; padding-left:5px; color:#6767A7;">x</span></a></span>
            <?php } ?></i></div>
        <?php } ?>

    <?php } ?>

    <ul>
        <?php $counter1=-1; if( isset($links) && is_array($links) && sizeof($links) ) foreach( $links as $key1 => $value1 ){ $counter1++; ?>

        <li<?php if( $value1["class"] ){ ?> class="<?php echo $value1["class"];?>"<?php } ?>>
            <div class="thumbnail"><?php echo thumbnail( $value1["url"] );?></div>
            <div class="linkcontainer">
                <span class="linktitle"><a href="<?php echo $redirector;?>
<?php echo $value1["url"];?>"><?php echo htmlspecialchars( $value1["title"] );?></a></span>
                <?php if( isLoggedIn() ){ ?>

                    <form method="GET" class="buttoneditform"><input type="hidden" name="edit_link" value="<?php echo $value1["linkdate"];?>"><input type="image" alt="Edit" src="images/edit_icon.png" title="Edit" class="button_edit"></form>
                    <form method="POST" class="buttoneditform"><input type="hidden" name="lf_linkdate" value="<?php echo $value1["linkdate"];?>">
                    <input type="hidden" name="token" value="<?php echo $token;?>"><input type="hidden" name="delete_link"><input type="image" alt="Delete" src="images/delete_icon.png" title="Delete" class="button_delete" onClick="return confirmDeleteLink();"></form>
                <?php } ?>

                <br>
                <?php if( $value1["description"] ){ ?><div class="linkdescription"<?php if( $search_type=='permalink' ){ ?> style="max-height:none !important;"<?php } ?>><?php echo $value1["description"];?></div><?php } ?>

                <?php if( !$GLOBALS['config']['HIDE_TIMESTAMPS'] || isLoggedIn() ){ ?>

                    <span class="linkdate" title="Permalink"><a href="?<?php echo smallHash( $value1["linkdate"] );?>"><?php echo htmlspecialchars( $value1["localdate"] );?> - permalink</a> - </span>
                <?php }else{ ?>

                    <span class="linkdate" title="Short link here"><a href="?<?php echo smallHash( $value1["linkdate"] );?>">permalink</a> - </span>
                <?php } ?>

                <div style="position:relative;display:inline;"><a href="http://invx.com/code/qrcode/?code=<?php echo urlencode( $scripturl );?>%3F<?php echo smallHash( $value1["linkdate"] );?>&width=200&height=200" onclick="return false;" class="qrcode"><img src="images/qrcode.png" width="13" height="13" title="QR-Code"></a></div> - 
                <span class="linkurl" title="Short link"><?php echo htmlspecialchars( $value1["url"] );?></span><br>
                <?php if( $value1["tags"] ){ ?>

                    <div class="linktaglist">
                    <?php $counter2=-1; if( isset($value1["taglist"]) && is_array($value1["taglist"]) && sizeof($value1["taglist"]) ) foreach( $value1["taglist"] as $key2 => $value2 ){ $counter2++; ?><span class="linktag" title="Add tag"><a href="?addtag=<?php echo urlencode( $value2 );?>"><?php echo htmlspecialchars( $value2 );?></a></span> <?php } ?>

                    </div>
                <?php } ?>

            </div>
        </li>
    <?php } ?>

    </ul>

    <?php LinkPage::linklistpagingTpl(); ?>


</div>

    <?php LinkPage::pagefooterTpl(); ?>

<script>
$(document).ready(function() {
	$('a.qrcode').click(function(){
	  hide_qrcode();
	  var link = $(this).attr('href');
	  $(this).after('<div class="qrcode" onclick="hide_qrcode();return false;"><img src="'+link+'" width="200" height="200"><br>click to close</div>');
	});
});
function hide_qrcode() { $('div.qrcode').remove(); }
</script>
</body>
</html>