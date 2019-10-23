<?php

namespace Aplikacja\In;

class Page
{
	public static function upperContent($title, $ActiveMenuCategory, $ActiveMenuSubCategory)
	{
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
<html lang="en">
       <?php
		require_once("includes/_head.php");
		?>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
       <?php
		require_once("includes/_wkurwiajacy_skrypt.txt");
		?>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">

					<?php
					require_once("includes/_prime_navigation.php");
					?>

                <div class="page-content-wrapper">

					<?php
					require_once("includes/_page_header_stuff.php");
					?>

					<?php
}

public static function lowerContent($ikona=false,$summernote=false)
{
	?>
					

  			<?php
			//require_once("includes/_page_footer.php");
			?>

			<?php
					//require_once("includes/_skroty.php");
			?>
    
  			<?php
			require_once("includes/_color_stuuf.php");
			?>
                  
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
       
			<?php
					//require_once("includes/_quick_menu.php");
			?>
		

			<?php
			require_once("includes/_messenger.php");
			?>

			<?php
			require_once("includes/_ustawienia.php");
			?>

			<?php
			require_once("includes/_end_page_settings.php");
			?>
			<?php
		if($summernote==true){
			include("includes/summernote.php");
		}
	?>
    </body>
	<?php
		if($ikona==true){
			include("includes/_font_generator.php");
		}
	?>
</html>
<?php
}
}
?>