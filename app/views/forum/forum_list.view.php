<?php
use Aplikacja\In as app;
app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);
?>
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item">MAIN</li>
                            <li class="breadcrumb-item">Forum</li>
                            <li class="breadcrumb-item active">Lista</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon fal fa-plus-circle'></i> Forum: <span class='fw-300'>List</span>
                                <small>
                                    Zbiór wszystkich działów forum
                                </small>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="input-group input-group-lg mb-g">
                                    <input type="text" class="form-control shadow-inset-2" placeholder="Search topics">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fal fa-search"></i></span>
                                    </div>
                                </div>
								<?php Aplikacja\Messages::flashMessages(); ?>
 																	<!--- tutaj sa kategortie --->
								
								<?php
								$forumList = new Aplikacja\Forum();
								
								$categories = $forumList -> pobierzKategorie();
								
								foreach($categories as $kategoria){
									
									include("app/views/forum/forum_parts/forums_cathegory.view.php");
									
								}
								?>
								
                            </div>
							<div class="col-12 clearfix">
							<a href="http://<?=ROOT_APP_URL;?>/makeNewCategoryForm" target="_self" class="btn btn-outline-info waves-effect waves-themed float-right">Make New Category</a>
							</div>
                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->

<?php
app\Page::lowerContent();
?>