<?php

use Aplikacja as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory, false);
?>
<style>
    .comic_background{
        width: 100%;
        height:400px;
        background-image: url(img/backgrounds/lion.jpg);
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: 0 -100px;
    }
    .layout-composed .comic_background{
        margin: 0 !important; }

    @media (max-width: 992px){
        .comic_background{
            margin: -1.5rem -1.5rem;
        }
    }
    @media (min-width: 992px){
        .comic_background{
            margin: -1.5rem -2rem;
        }
    }

    .text_shadow{
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black
    }

    .tables{
        background-color: #eeeeee;
        border-radius: 12px 12px 8px 8px;
        border: 1px solid #bbbbbb;
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
        background-color: #eeeeee;
        padding: 5px;
    }

    .tables tr:nth-child(odd) td{
        background-color: #f8f8f8;
    }
    .tables thead tr:first-child th:first-child{
         border-radius: 12px 0 0 0;
     }
    .tables thead tr:first-child th:last-child{
        border-radius: 0px 12px 0 0;
    }
    .tables tr:last-child td:first-child{
        border-radius: 0px 0px 0px 8px;
    }
    .tables tr:last-child td:last-child{
        border-radius: 0px 0px 8px 0px;
    }


    .comic-name{
        color: #fffffd;
    }
</style>

    <main id="js-page-content m-0" role="main" class="page-content" style="position: relative">
        <div class="position-absolute comic_background">

        </div>

    <ul class="breadcrumb page-breadcrumb text_shadow">
        <li class="breadcrumb-item "><a class="text-white fw-300" href="http://<?=ROOT_APP_URL;?>"><?=SITE_NAME;?></a></li>
        <li class="breadcrumb-item active"><span class="text-white-50 fw-300">Comic</span></li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date text-white-50 fw-300"></span></li>
    </ul>

    <div class="row">
        <div class="col-12 px-6" style="height: 250px">
            <div class="m-auto">
                <h3 class="display-1 comic-name">TESTOWE NAZWE</h3>
            </div>
        </div>

        <div class="col-md-8 col-lg-8 col-xl-6 col-12 col-sm-12 panel p-0 offset-xl-1" style="background-color: transparent; border: 0px">

            <table class="tables" style="">
                <thead>
                    <tr>
                        <th class="text-monospace">#NR</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                    </tr>
                </thead>
                <tr>
                    <td>Jill</td>
                    <td>Smith</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>94</td>
                </tr>
                <tr>
                    <td>Eve</td>
                    <td>Jackson</td>
                    <td>94</td>
                </tr>
            </table>

        </div>
        <div class="col-md-3 col-12 col-sm-12 panel offset-md-1">
            <div class="mx-auto mt-4"><a href="#" class="btn btn-success">#DONATE</a></div>
        </div>
    </div>

    </main>
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

<?php
app\Page::lowerContent();

?>