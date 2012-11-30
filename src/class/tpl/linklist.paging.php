<div class="paging">
<?php if( isLoggedIn() ){ ?>

    <div id="paging_privatelinks">
        <a href="?privateonly">
		<?php if( $privateonly ){ ?>
		Click to see all links
		<?php }else{ ?>
		Click to see only private links
		<?php } ?>
		</a>
    </div>
<?php } ?>

    <div id="paging_linksperpage">
        Links per page: <a href="?linksperpage=20">20</a> <a href="?linksperpage=50">50</a> <a href="?linksperpage=100">100</a>
        <form method="GET" style="display:inline;" class="linksperpage"><input type="text" name="linksperpage" size="2" style="height:15px;"></form>
    </div>
    <?php if( $previous_page_url ){ ?> <a href="<?php echo $previous_page_url;?>" id="paging_older">&#x25C4;Older</a> <?php } ?>

    <div id="paging_current">page <?php echo $page_current;?> / <?php echo $page_max;?> </div>
    <?php if( $next_page_url ){ ?> <a href="<?php echo $next_page_url;?>" id="paging_newer">Newer&#x25BA;</a> <?php } ?>

</div>