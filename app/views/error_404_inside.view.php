<?php
use Aplikacja\In as app;
app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);
?>
<main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
                            <li class="breadcrumb-item">Page Views</li>
                            <li class="breadcrumb-item">Error Pages</li>
                            <li class="breadcrumb-item active">Server Error</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">Monday, October 21, 2019</span></li>
                        </ol>
                        <div class="subheader">
                        </div>
                        <div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
                            <h1 class="page-error color-fusion-500">
                                ERROR <span class="text-gradient">404</span>
                                <small class="fw-500">
                                    Something <u>went</u> wrong!
                                </small>
                            </h1>
                            <h3 class="fw-500 mb-5">
                                Probably you are looking for page that is no longer active or you just want to make's us angry!
                            </h3>
                            <h4>
                                Go back
                            </h4>
                        </div>
                    </main>
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<?php
app\Page::lowerContent();
?>