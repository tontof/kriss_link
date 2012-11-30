<div id="footer">
    <b><a href="http://github.com/tontof/kriss_link">KrISS link <?php echo htmlspecialchars( $version );?></a></b> - A simple and smart (or stupid) <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">shaarli</a>. By <a href="http://tontof.net">Tontof</a>.
</div>
<?php if( $newversion ){ ?>

    <div id="newversion"><span style="text-decoration:blink;">&#x25CF;</span> Shaarli <?php echo htmlspecialchars( $newversion );?> is <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli#download">available</a>.</div>
<?php } ?>

<?php if( isLoggedIn() ){ ?>

<script language="JavaScript">function confirmDeleteLink() { var agree=confirm("Are you sure you want to delete this link ?"); if (agree) return true ; else return false ; }</script>
<?php } ?>


