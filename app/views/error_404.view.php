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

	use Aplikacja\Register as app2;

	app2\Page::upperContent($title);

	?>
    <body>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper alt">
            <!-- BEGIN Page Content -->
            <!-- the #js-page-content id is needed for some plugins to initialize -->
            <main id="js-page-content" role="main" class="page-content">
                <div class="h-alt-f d-flex flex-column align-items-center justify-content-center text-center">
                    <h1 class="page-error color-fusion-500">
                        ERROR <span class="text-gradient">404</span>
                        <small class="fw-500">
                            Something <u>went</u> wrong!
                        </small>
                    </h1>
                    <h3 class="fw-500 mb-5">
                        
                    </h3>
                    <h4>
                        Probably you were going somewhere you shouldn't. Go back where you started!
                    </h4>
                </div>
            </main>
            <!-- END Page Content -->
            <!-- BEGIN Page Footer -->
            <!-- BEGIN Page Footer -->
            <footer class="page-footer" role="contentinfo">
                <div class="d-flex align-items-center flex-1 text-muted">
                    <span class="hidden-md-down fw-700">2019 © Copyright by <a href='http://<?=ROOT_LANDING_URL;?>' class='opacity-100 fw-500 color-fusion-900' title='gotbootstrap.com'><?=SITE_NAME;?></a></span>
                </div>
            </footer>
            <!-- END Page Footer -->
            <!-- END Page Footer -->
        </div>
        		 <?php

			app2\Page::lowerContent();

		?>
    </body>
</html>
