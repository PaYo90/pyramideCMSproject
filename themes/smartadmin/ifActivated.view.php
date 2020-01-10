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
    <head>
        <meta charset="utf-8">
        <title>
            <?=$title;?>
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="themes/smartadmin/css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="themes/smartadmin/css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="themes/smartadmin/css/fa-brands.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="<?="http://".ROOT_APP_URL;?>" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                    <span class="page-logo-text mr-1"><?=SITE_NAME;?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <?php
							if($this->get["pw"]=="done"){
								echo '
							<div class="row">
                                <div class="col-xl-12">
                                    <h2 class="fs-xxl fw-500 mt-6 text-white text-center">
										<br><br><br><br><br><br><br>
                                        Account activated. Now you can log-in
									</h2><p class="text-center fw-500 fs-xxl">
									<a class="text-center fw-500 fs-xxl" href="http://'.ROOT_APP_URL.'/loginForm">Go back to main window</a></p>
                                </div>
                            </div>
								';
							}else{
								
								echo '
							<div class="row">
                                <div class="col-xl-12">
                                    <h2 class="fs-xxl fw-500 mt-6 text-white text-center">
										<br><br><br><br><br><br><br>
                                        Account already active
									</h2><p class="text-center fw-500 fs-xxl">
									<a class="text-center fw-500 fs-xxl" href="http://'.ROOT_APP_URL.'/loginForm">Go back to main window</a></p>
                                </div>
                            </div>
								';
								}
							?>

                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2019 © Copyright by&nbsp;<a href='<?="http://".ROOT_APP_URL;?>' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'><?=SITE_NAME;?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </body>
</html>
