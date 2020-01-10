<?php

use Aplikacja as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory, false, false, false);
?>
<style>
    .comic_background{
        width: 100%;
        height:400px;
        background-image: url(img/backgrounds/nighsky.jpeg);
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: 0 -100px;
    }
    .layout-composed .margin_background{
        margin: 0 !important; }

    @media (max-width: 576px){/*xs up*/
        .margin_background{
            margin: -1.5rem -1.5rem;
        }
    }
    @media (min-width: 577px){/*sm up*/
        .margin_background{
            margin: -1.5rem -1.5rem;
        }
    }
    @media (min-width: 769px){/*md up*/
        .margin_background{
            margin: -1.5rem -1.5rem;
        }

    }
    @media (min-width: 992px){/*lgup*/
        .margin_background{
            margin: -1.5rem -2rem;
        }
        .width {
            width: 992px;
            Margin: auto
        }
    }
    @media (min-width: 1200px){/*xl*/
        .margin_background{
            margin: -1.5rem -2rem;
        }

        .width {/*1200*/
            width: 1266px;
            Margin: auto
        }
    }

    .comic-name{
        font-size: 27px;
    }

    .text_shadow{
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black
    }

    .tables{
        background-color: #ffffff;
        border-radius: 8px 5px 8px 8px;
        border: 0px solid #bbbbbb;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        box-shadow: 0 0 2px whitesmoke;
    }

    .tables td{
        padding: 5px;
    }

    .tables tr:not(:last-child) td{
        border-bottom: 1px solid #ffffff;
    }
    .tables thead tr th{
        border-bottom: 1px solid #ffffff;
        background-color: #ffffff;
        padding: 5px;
    }

    .tables tr:nth-child(odd) td{
        background-color: #f8f8f8;
    }
    .tables thead tr:first-child th:first-child{
         border-radius: 8px 0 0 0;
     }
    .tables thead tr:first-child th:last-child{
        border-radius: 0px 5px 0 0;
    }
    .tables tr:last-child td:first-child{
        border-radius: 0px 0px 0px 8px;
    }
    .tables tr:last-child td:last-child{
        border-radius: 0px 0px 8px 0px;
    }
    .tables thead tr th:first-child, .tables tr td:first-child{
        width: 15px;
    }
    .tables thead tr th:last-child, .tables tr td:last-child{
        width: 15px;
        Margin: auto;
    }

    .mine {
        border-radius: 0px 3px 3px 0px;
    }

    .comic-name{
        color: #fffffd;
    }

    .page-content-wrapper{
        background-color: #000000;
    }
</style>
    <main id="js-page-content" role="main" class="page-content" style="background-color: rgba(255,255,255, .0) ;position: relative">
        <div class="row position-absolute margin_background comic_background">

        </div>
        <div class="col-12 m-0 p-0" >
        <ul class="breadcrumb page-breadcrumb text_shadow">
            <li class="breadcrumb-item "><a class="text-white fw-300" href="http://<?=ROOT_APP_URL;?>"><?=SITE_NAME;?></a></li>
            <li class="breadcrumb-item active"><span class="text-white fw-300">Comic</span></li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date text-white fw-300"></span></li>
        </ul>

        <div class="row">
            <div class="col-12 px-4" style="height: 200px">
                <div class="mx-0 mt-lg-6">
                    <span class="comic-name">TESTOWE NAZWE</span>
                </div>
            </div>

            <div class="col-4 offset-8 col-md-6 offset-md-6 text-right position-absolute" style="height: 50px; border: 0px solid red">
                <a href="#" class="btn btn-icon rounded-circle btn-light"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn btn-icon rounded-circle btn-light"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-icon rounded-circle btn-light"><i class="fab fa-tumblr"></i></a>
                <a href="#" class="btn btn-icon rounded-circle btn-light"><i class="fab fa-reddit"></i></a>
                <a href="#" class="btn btn-icon rounded-circle btn-light"><i class="fas fa-copy"></i></a>
                <a href="#" class="btn btn-icon rounded-circle btn-light"><i class="fas fa-rss"></i></a>
            </div>
        </div><div class="row justify-content-around">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 panel p-0 offset-lg-0" style="background-color: transparent; border: 0px">

                <table class="tables" style="">
                    <thead>
                        <tr>
                            <th class="text-monospace">#NR</th>
                            <th>TITLE</th>
                            <th>DATE</th>
                            <th>PRICE</th>
                            <th>SEEN?</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>3</td>
                        <td>Smith</td>
                        <td>11.11.2019</td>
                        <td>50</td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jackson</td>
                        <td>12.13.2013</td>
                        <td>94</td>
                        <td><i class="fal fa-check"></i></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Jackson</td>
                        <td>13.14.2015</td>
                        <td>94</td>
                        <td><i class="fal fa-check"></i></td>
                    </tr>
                </table>

            </div>
                <div class="col-12 col-sm-12 col-md-5 mine panel" style="border-radius: 3px">
                    <div class="mx-auto mt-4"><a href="#" class="btn btn-success">#DONATE</a></div>
                </div>
            </div>
        </div>
    </main>
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>



<?php
require_once("themes/smartadmin/includes/_page_footer.php");
?>

<?php
//require_once("themes/smartadmin/includes/_skroty.php");
?>

<?php
require_once("themes/smartadmin/includes/_color_stuuf.php");
?>

</div>
</div>
</div>
<!-- END Page Wrapper -->

<?php
require_once("themes/smartadmin/includes/_quick_menu.php");
?>


<?php
require_once("themes/smartadmin/includes/_messenger.php");
?>

<?php
require_once("themes/smartadmin/includes/_ustawienia.php");
?>

<?php
require_once("themes/smartadmin/includes/_end_page_settings.php");
?>
<script type="text/javascript">

    initApp.pushSettings("nav-function-minify layout-composed", false);

</script>
</body>
</html>