
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
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                        <div class="d-flex align-items-center container p-0">
                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                <a href="http://<?=ROOT_LANDING_URL;?>" class="page-logo-link press-scale-down d-flex align-items-center">
                                    <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                    <span class="page-logo-text mr-1"><?=SITE_NAME;?></span>
                                </a>
                            </div>
                            <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
                                Already a member?
                            </span>
                            <a href="http://<?=ROOT_APP_URL;?>/loginForm" class="btn-link text-white ml-auto ml-sm-0">
                                Secure Login
                            </a>
                        </div>
                    </div>
                    <div class="flex-1" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                                        Register now and start earning!
                                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                                            Biggest donation site on the internet!
                                            <br>Join us, join the Rebelion!
                                        </small>
                                    </h2>
                                </div>
                                <div class="col-xl-6 ml-auto mr-auto">
                                    <div class="card p-4 rounded-plus bg-faded">
                                        <?php Aplikacja\Messages::flashMessages(); ?>
                                        <form id="js-login" novalidate="" action="http://<?=ROOT_APP_URL;?>/register" method="post">
                                            <div class="form-group row">
                                                <label class="col-xl-12 form-label" for="fname">Your first and last name</label>
                                                <div class="col-6 pr-1">
                                                    <input type="text" id="fname" minlenght="2" maxlength="16" name="fname" class="form-control" placeholder="First Name" required>
                                                    <div class="invalid-feedback">No, you missed this one.</div>
                                                </div>
                                                <div class="col-6 pl-1">
                                                    <input type="text" id="lname" minlenght="2" maxlength="16" name="lname" class="form-control" placeholder="Last Name" required>
                                                    <div class="invalid-feedback">No, you missed this one.</div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" id="username" minlenght="2" maxlength="32" name="username" class="form-control" placeholder="Your Username" required>
                                                <div class="invalid-feedback">No, you missed this one.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="emailverify">Email will be needed for verification and account recovery</label>
                                                <input type="email" minlenght="2" maxlength="64" id="emailverify" name="email" class="form-control" placeholder="Email for verification" required>
                                                <div class="invalid-feedback">No, you missed this one.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="userpassword">Pick a password: </label>
                                                <input type="password" minlenght="2" maxlength="32" id="userpassword" name="password" class="form-control" placeholder="minimm 8 characters" required>
                                                <div class="invalid-feedback">Sorry, you missed this one.</div>
                                                <div class="help-block">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</div>
                                            </div>
											<div class="form-group">
                                                <label class="form-label" for="userpassword">Confirm password: </label>
                                                <input type="password" minlenght="2" maxlength="32" name="password2" class="form-control" placeholder="minimm 8 characters" required>
												<div class="invalid-feedback">Sorry, you missed this one.</div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="agreed" class="custom-control-input" id="terms" name="terms" required>
                                                    <label class="custom-control-label" for="terms"> I agree to terms & conditions</label>
                                                    <div class="invalid-feedback">You must agree before proceeding</div>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" value="yes" id="newsletter" name="newsletter">
                                                    <label class="custom-control-label" for="newsletter">Sign up for newsletters (dont worry, we won't send so many)</label>
                                                </div>
                                            </div>
		
    										</div>
                                            <div class="row no-gutters">
                                                <div class="col-md-4 ml-auto text-right">
                                                    <button id="js-login-btn" type="submit" class="btn btn-block btn-danger btn-lg mt-3">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2019 © Copyright by <a href='http://<?=ROOT_LANDING_URL;?>' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'><?=SITE_NAME;?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		 <?php

			app2\Page::lowerContent();

		?>
		
    </body>
</html>
