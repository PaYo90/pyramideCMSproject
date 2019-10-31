<?php
use Aplikacja\In as app;
app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);
?>
 <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item">MAIN</li>
                            <li class="breadcrumb-item">Forum</li>
                            <li class="breadcrumb-item active">Forum name</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon fal fa-plus-circle'></i> Forum: <span class='fw-300'>thread name</span>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="input-group input-group-lg mb-g">
                                    <input type="text" class="form-control shadow-inset-2" placeholder="Search Discussion">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fal fa-search"></i></span>
                                    </div>
                                </div>
                                <!-- post -->
								
								<?php
								
								foreach($posts as $post){
									include("app/views/forum/forum_parts/forum_post.php");
								}
								
								?>
                                <!-- post -end -->
                                <ul class="pagination mt-3">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">
                                            1
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<?php
app\Page::lowerContent();
?>