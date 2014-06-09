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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="resources/css/normalize.css">
        <link rel="stylesheet" href="resources/css/main.css">
        <script src="resources/js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <?php
                        if($loggedin != true){
                    ?>
                            <li><a href="/login">Login</a></li>
                    <?php
                        }else{
                    ?>
                            <li><a href="/logout">Logout</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </nav>

        </header>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->