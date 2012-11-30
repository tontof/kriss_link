
    <div style="float:right; font-style:italic; color:#bbb; text-align:right; padding:0 5 0 0;" class="nomobile">Shaare your links...<br>
        <?php if( !empty($linkcount) ){ ?>
<?php echo $linkcount;?> links<?php } ?></div>
    <span id="shaarli_title"><a href="?"><?php echo $shaarlititle;?></a></span>
  
<?php if( !empty($_GET['source']) && $_GET['source']=='bookmarklet' ){ ?>

    
<?php }else{ ?>

    <a href="?" class="nomobile">Home</a>
    <?php if( isLoggedIn() ){ ?>

        <a href="?do=logout">Logout</a><a href="?do=tools">Tools</a><a href="?do=addlink"><b>Add link</b></a>
    <?php }elseif( $GLOBALS['config']['OPEN_SHAARLI'] ){ ?>

        <a href="?do=tools">Tools</a><a href="?do=addlink"><b>Add link</b></a>
    <?php }else{ ?>

        <a href="?do=login">Login</a>
    <?php } ?>

    <a href="<?php echo $feedurl;?>?do=rss<?php echo $searchcrits;?>" class="nomobile">RSS Feed</a>
    <a href="<?php echo $feedurl;?>?do=atom<?php echo $searchcrits;?>" style="padding-left:10px;" class="nomobile">ATOM Feed</a>
    <a href="?do=tagcloud">Tag cloud</a>
    <a href="?do=picwall<?php echo $searchcrits;?>">Picture wall</a>
    <a href="?do=daily">Daily</a>
<?php } ?>

    <div class="clear"></div>


