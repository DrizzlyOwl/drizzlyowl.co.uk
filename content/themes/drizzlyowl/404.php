<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="f8YXdLs4a9b5eCUkkWTPDNfv6E7gbOt1nEIKOcJhAWs" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

<title><?php wp_title(); ?></title>
<link rel="icon" href="<?php assets('imgs'); ?>/favicon.ico" type="image/x-icon">

<script type="text/javascript">
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
<body>
    <section class="container">
        <main class="content" id="content">
            <div class="aspect-ratio--1-2  aspect-ratio--m  aspect-ratio--16-9--l">
                <iframe class="absolute" src="http://notfound-static.fwebservices.be/404/index.html?&amp;key=f511db675f5f1dad18ec486a31b57cf7" frameborder="0"></iframe> 
            </div>
        </main>
    </section>
</body>
</html>