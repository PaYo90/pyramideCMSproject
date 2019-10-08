<?php

namespace Wesel\Shortener;

class Page
{
    public static function displayHeader($title)
    {
        ?>
        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?=$title;?></title>

        <!-- Bootstrap Core CSS -->
        <link href="app/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="app/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="app/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="app/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="app/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="app/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125895089-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125895089-1');
</script>


    </head>
    <body>
        <div id="wrapper">
        
        <?php
    }

    public static function displayNavigation()
    {
        ?>
        
        <!-- Navigation -->
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://<?=ROOT_APP_URL;?>">START</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Skracamy.com</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?=$_SESSION['user']->email;?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="https://<?=ROOT_APP_URL;?>/changePasswordForm"><i class="fa fa-gear fa-fw"></i> Zmień hasło</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="https://<?=ROOT_APP_URL;?>/logout"><i class="fa fa-sign-out fa-fw"></i> Wyloguj</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="https://<?=ROOT_APP_URL;?>"><i class="fa fa-dashboard fa-fw"></i> Twoje linki</a>
                            </li>
                            <li>
                                <a href="https://<?=ROOT_APP_URL;?>/newUrl"><i class="fa fa-edit fa-fw"></i> Dodaj nowy link</a>
                            </li>
                            <?php if (!empty($_SESSION['user']) && $_SESSION['user']->isAdmin()): ?>
                            <li>
                                <a href="https://<?=ROOT_APP_URL;?>/users"><i class="fa fa-edit fa-fw"></i> Użytkownicy</a>
                            </li>
                            <li>
                                <a href="https://<?=ROOT_APP_URL;?>/reports"><i class="fa fa-edit fa-fw"></i> Raporty</a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="https://<?=ROOT_APP_URL;?>/changePasswordForm"><i class="fa fa-gear fa-fw"></i> Zmień hasło</a>
                            </li>

                            <li>
                                <a href="https://<?=ROOT_APP_URL;?>/logout"><i class="fa fa-user fa-fw"></i> Wyloguj</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <?php
    }

    public static function displayFooter()
    {
        ?>
            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="app/js/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="app/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="app/js/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="app/js/raphael.min.js"></script>
            <script src="app/js/morris.min.js"></script>
            <script src="app/js/morris-data.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="app/js/startmin.js"></script>
        </body>
    </html>
    <?php
    }
}