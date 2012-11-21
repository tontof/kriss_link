<div id="footer">
    <b><a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">Shaarli <?php echo htmlspecialchars( $version );?></a></b> - The personal, minimalist, super-fast, no-database delicious clone. By <a href="http://sebsauvage.net" target="_blank">sebsauvage.net</a>. Theme by <a href="http://blog.idleman.fr" target="_blank">idleman.fr</a>.
</div>
<?php if( $newversion ){ ?>

    <div id="newversion"><span style="text-decoration:blink;">&#x25CF;</span> Shaarli <?php echo htmlspecialchars( $newversion );?> is <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli#download">available</a>.</div>
<?php } ?>

<?php if( isLoggedIn() ){ ?>

<script language="JavaScript">function confirmDeleteLink() { var agree=confirm("Are you sure you want to delete this link ?"); if (agree) return true ; else return false ; }</script>
<?php } ?>


<?php if( $GLOBALS['config']['OPEN_SHAARLI'] || isLoggedIn() ){ ?>

<script language="JavaScript">
$(document).ready(function()
{
    $('#lf_tags').autocomplete({source:'<?php echo $source;?>?ws=tags',minLength:1});
    $('#searchtags').autocomplete({source:'<?php echo $source;?>?ws=tags',minLength:1});
    $('#fromtag').autocomplete({source:'<?php echo $source;?>?ws=singletag',minLength:1});
});
</script>
<?php } ?>

