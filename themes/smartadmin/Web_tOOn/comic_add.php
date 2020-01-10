<?php

use Aplikacja as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory, false, false, false);
?>
    <link rel="stylesheet" media="screen, print" href="http://<?=ROOT_APP_URL;?>/themes/smartadmin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <main id="js-page-content" role="main" class="page-content">

        <div class="col-12 m-0 p-0" >
            <ul class="breadcrumb page-breadcrumb">
                <li class="breadcrumb-item "><a class=" fw-300" href="http://<?=ROOT_APP_URL;?>"><?=SITE_NAME;?></a></li>
                <li class="breadcrumb-item active"><span class=" fw-300">Comic</span></li>
                <li class="breadcrumb-item active"><span class=" fw-300">Add</span></li>
                <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date  fw-300"></span></li>
            </ul>
            <div class="subheader">
                <h1 class="subheader-title">
                    <i class="fal fa-plus-circle"></i> Comic <span class="fw-300">add</span>
                    <small>
                        Add new comic to your profile
                    </small>
                </h1>
            </div>
            <div class="row" style="border: 0px solid black">
                <div class="panel col-12 col-lg-8 offset-lg-2">
                    <br>
                    <form action="http://<?=ROOT_APP_URL;?>/comicAddForm" method="post" enctype="multipart/form-data">
                        <div class="col-12 " style="border: 0px solid black"><label>Title:</label></div>
                        <div class="col-12" style="border: 0px solid black"><input type="text" class="form-control" maxlength="120" name="title"></div><br>
                        <div class="col-12 offset-0" style="border: 0px solid black">Comic themplate?</div>
                        <div class="row">
                            <div class="col-6 offset-0 text-center" style="border: 0px solid black">A4 - multiple pages per chapter (595 x 842 px) <br><input type="radio" value="1" name="style"> </div>
                            <div class="col-6 offset-0 text-center d-inline" style="border: 0px solid black">Worm - One long page (595 x ??? px)<br><input type="radio" value="2" name="style"> </div>
                        </div><br>
                        <div class="row">
                            <div class=" px-4 col-12 form-group">
                                <label>Gatunek:</label>
                                <select class="form-control" name="genre">
                                    <option selected disabled hidden >Choose one</option>
                                    <option>DRAMAT</option>
                                    <option>ROMANS</option>
                                    <option>FANTASTYKA</option>
                                    <option>SCI-FI</option>
                                    <option>Okruchy Zycia</option>
                                    <option>Szkolne</option>
                                </select>
                            </div>
                        </div>
<br><div class="row ">
                            <div class="col-12"><label class="px-3">Release date:</label></div>
                            <div class="col-5 text-center">Now<br><input type="checkbox" name="releasedatenow"></div>
                            <div class="col-1 text-center my-auto">OR</div>
                            <div class="col-6 px-4 text-center"><div class="input-group"><!--MAKE TODAY DATE-->
                                    <input type="text" class="form-control " value="<?php echo date('m/d/Y');?>" id="datepicker-3" name="releasedate">
                                    <div class="input-group-append">
                                                            <span class="input-group-text fs-xl">
                                                                <i class="fal fa-calendar-alt"></i>
                                                            </span>
                                    </div>
                                </div>  </div>


                        </div><br><div class="col-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Cover</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="fileToUpload">
                                    <label class="custom-file-label" for="customFile" name="fileToUpload"></label>
                                </div>
                            </div>
                        </div><br>
                        <div class="col-12 clearfix">
                            <button class="btn btn-light float-right" name="">CREATE</button>
                        </div><br><br>
                        <div class="help-block px-3">Site takes 28% from sold chapters. You can assign a price to certain chapter while uploading one after making comic. Empty Comics without first chapter will be deleted after 24 h after making comic. Remember to upload first chapter as soon as you can, or set date release.</div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </main>
    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

<!-- END Page Footer -->
<!-- BEGIN Shortcuts -->
<?php
 require_once("themes/smartadmin/includes/_skroty.php");
?>
<!-- END Shortcuts -->
<!-- BEGIN Color profile -->
<!-- this area is hidden and will not be seen on screens or screen readers -->
<!-- we use this only for CSS color refernce for JS stuff -->
<?php
require_once("themes/smartadmin/includes/_color_stuuf.php");
?>
<!-- END Color profile -->
</div>
</div>
</div>
<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
<?php
require_once("themes/smartadmin/includes/_quick_menu.php");
?>
<!-- END Quick Menu -->
<!-- BEGIN Messenger -->
<?php
require_once("themes/smartadmin/includes/_messenger.php");
?>
<!-- END Messenger -->
<!-- BEGIN Page Settings -->
<?php
require_once("themes/smartadmin/includes/_ustawienia.php");
?><!-- END Page Settings -->
<!-- base vendor bundle:
     DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
                + pace.js (recommended)
                + jquery.js (core)
                + jquery-ui-cust.js (core)
                + popper.js (core)
                + bootstrap.js (core)
                + slimscroll.js (extension)
                + app.navigation.js (core)
                + ba-throttle-debounce.js (core)
                + waves.js (extension)
                + smartpanels.js (extension)
                + src/../jquery-snippets.js (core) -->
<script src="themes/smartadmin/js/vendors.bundle.js"></script>
<script src="themes/smartadmin/js/app.bundle.js"></script>
<script src="themes/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script>
    // Class definition

    var controls = {
        leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
        rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }

    var runDatePicker = function()
    {

        // minimum setup
        $('#datepicker-1').datepicker(
            {
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls
            });


        // input group layout
        $('#datepicker-2').datepicker(
            {
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls
            });

        // input group layout for modal demo
        $('#datepicker-modal-2').datepicker(
            {
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls
            });

        // enable clear button
        $('#datepicker-3').datepicker(
            {
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                templates: controls
            });

        // enable clear button for modal demo
        $('#datepicker-modal-3').datepicker(
            {
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true,
                templates: controls
            });

        // orientation
        $('#datepicker-4-1').datepicker(
            {
                orientation: "top left",
                todayHighlight: true,
                templates: controls
            });

        $('#datepicker-4-2').datepicker(
            {
                orientation: "top right",
                todayHighlight: true,
                templates: controls
            });

        $('#datepicker-4-3').datepicker(
            {
                orientation: "bottom left",
                todayHighlight: true,
                templates: controls
            });

        $('#datepicker-4-4').datepicker(
            {
                orientation: "bottom right",
                todayHighlight: true,
                templates: controls
            });

        // range picker
        $('#datepicker-5').datepicker(
            {
                todayHighlight: true,
                templates: controls
            });

        // inline picker
        $('#datepicker-6').datepicker(
            {
                todayHighlight: true,
                templates: controls
            });
    }

    $(document).ready(function()
    {
        runDatePicker();
    });

</script>
</body>
</html>
