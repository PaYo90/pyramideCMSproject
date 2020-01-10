<?php

namespace Aplikacja;

class Page
{

	public static function upperContent($title, $ActiveMenuCategory, $ActiveMenuSubCategory, $enable_button_trycomposed=true, $mod_main_boxed=false, $hide_nav_bar_nav=false, $page_content_wrapper_Black_bg=false, $albums=0)
	{
	    $trycomposed = $enable_button_trycomposed; //zmienic potem ta zmienna w nav
		?>
<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.2
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en"><!--TODO: ustawic zmienna jezykowa-->
        <div id="auto"></div>
       <?php
        eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/includes/_head.php")));

		?><script>
        function OnLoad() {
            $('#auto').load("http://<?=ROOT_APP_URL;?>/app/ajax/StillAlive.php");
        }
        window.onload = OnLoad;



var stillAlive = setInterval(function () {
    /* XHR back to server
       Example uses jQuery */
    $('#auto').load("app/ajax/StillAlive.php");
}, 60000);
</script>
    <body id="body" class="mod-bg-1 <?php if($mod_main_boxed==true){echo "mod-main-boxed";}?>">

        <!-- DOC: script to save and load page settings -->
       <?php
       eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/includes/_wkurwiajacy_skrypt.php")));

		?>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">

					<?php
                    eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/includes/_prime_navigation.php")));

					?>

                <div class="page-content-wrapper">

					<?php
                    eval('?>'.CodeParser::sting_code(FileReader::read("themes/smartadmin/includes/_page_header_stuff.php")));

					?>

					<?php
}

public static function lowerContent($ikona=false,$summernote=false)
{
	?>
					

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
			<?php
		if($summernote==true){
			include("themes/smartadmin/includes/summernote.php");
		}
	?>
    </body>
	<?php
		if($ikona==true){
			include("themes/smartadmin/includes/_font_generator.php");
		}
	?>
</html>
<?php
}
}
?>