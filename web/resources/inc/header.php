<?php
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/init.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Projects | Digital Art &amp; Technology degree show 2014</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="//use.typekit.net/nls3bbo.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Hammer reload -->
          <script>
            setInterval(function(){
              try {
                if(typeof ws != 'undefined' && ws.readyState == 1){return true;}
                ws = new WebSocket('ws://'+(location.host || 'localhost').split(':')[0]+':35353')
                ws.onopen = function(){ws.onclose = function(){document.location.reload()}}
                ws.onmessage = function(){
                  var links = document.getElementsByTagName('link'); 
                    for (var i = 0; i < links.length;i++) { 
                    var link = links[i]; 
                    if (link.rel === 'stylesheet' && !link.href.match(/typekit/)) { 
                      href = link.href.replace(/((&|\?)hammer=)[^&]+/,''); 
                      link.href = href + (href.indexOf('?')>=0?'&':'?') + 'hammer='+(new Date().valueOf());
                    }
                  }
                }
              }catch(e){}
            }, 1000)
          </script>
        <!-- /Hammer reload -->
      
        <link rel='stylesheet' href='/resources/css/normalize.css'>
        <link rel='stylesheet' href='/resources/css/main.css'>
        <link rel="stylesheet" href="/resources/css/admin.css">

        <script src='js/vendor/modernizr-2.6.2.min.js'></script>        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<!-- Add your site or application content here -->
<div class="container">

<header class="main-header clearfix">
<nav role="navigation" class="main-nav clearfix">
    <ul class="clearfix">
        <li><a class="selected" href="/">Projects</a></li>
        <li><a href="/students">Students</a></li>

        <?php
            if($loggedin == true){
        ?>
                <li><a href="/admin">Admin</a></li>
                <li><a href="/logout">Logout</a></li>

        <?php
            }
        ?>
    </ul>
</nav>

<?php if($strPage == 'projects'){ ?>

    <section class="main-intro">
    <h1>Digital Art &amp; Technology</h1>
    <h2 class="subheader">Graduate Showcase 2014</h2>
    <p>
        Digital Art &amp; Technology is a tough course to sum-up — it unveils a new cohort of fresh-faced creative folk every year; each of whom is equipped with a different — often unique — set of skills. We're interaction designers, game developers, creative technologists, and yet so much more. Take a look around; we hope you'll be impressed and are sure you'll be surprised.
    </p>
    </section>
    </header>

<?php }else{ ?>


    <h1>Digital Art &amp; Technology</h1>
    <h2 class="subheader">Graduate Showcase 2014</h2>
    </header>

<?php } ?>