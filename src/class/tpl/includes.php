<title><?php echo $pagetitle;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link rel="alternate" type="application/rss+xml" href="<?php echo $feedurl;?>?do=rss<?php echo $searchcrits;?>" title="RSS Feed" />
<link rel="alternate" type="application/atom+xml" href="<?php echo $feedurl;?>?do=atom<?php echo $searchcrits;?>" title="ATOM Feed" />
<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="inc/shaarli.css?version=<?php echo urlencode( $version );?>" />
<?php if( is_file('inc/user.css') ){ ?><link type="text/css" rel="stylesheet" href="inc/user.css?version=<?php echo $version;?>" /><?php } ?>

<script src="inc/jquery.min.js"></script><script src="inc/jquery-ui.min.js"></script>
