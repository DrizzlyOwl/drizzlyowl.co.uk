<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="f8YXdLs4a9b5eCUkkWTPDNfv6E7gbOt1nEIKOcJhAWs" />
<title><?php wp_title(); ?></title>
<link rel="icon" href="<?php assets('imgs'); ?>/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.0.0/styles/monokai-sublime.min.css">
<script src="<?php assets('js'); ?>/highlight.pack.js"></script>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

<script type="text/javascript">

  hljs.initHighlightingOnLoad();

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71558587-1', 'auto');
  ga('send', 'pageview');

  WebFontConfig = {
    google: { families: [ 'Lato:400,300,100,700,900,400italic:latin' ] }
  };

  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

</script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="body">

<!-- Content!! -->
<section class="container">

    <?php bem_menu(); ?>

    <aside class="sidebar">
        <?php get_sidebar(); ?>
    </aside>

    <div class="mobile-nav-toggle"><i class="fa fa-fw fa-bars fa-3x" id="navToggle"></i></div>

    <main class="content  content--offset  |  white-bg" id="content">
