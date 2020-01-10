<?php
use Aplikacja as app;
app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);
?>
<link rel="stylesheet" media="screen, print" href=<?="http://".ROOT_APP_URL."/themes/smartadmin/css/formplugins/summernote/summernote.css";?>>
<main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=ROOT_APP_URL;?></a></li>
                            <li class="breadcrumb-item">MAIN</li>
                            <li class="breadcrumb-item">Forum</li>
                            <li class="breadcrumb-item active">ZMIENNA_FORUM_NAME</li>
							<li class="breadcrumb-item active">New Thread</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">Sunday, October 20, 2019</span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class="subheader-icon fal fa-plus-circle"></i> Forum: <span class="fw-300">New Thread</span>
                                <small>
                                    Written in: forum name
                                </small>
                            </h1>
                        </div>
      
                                <div class="row justify-content-md-center">
									
									
                            <div class="col-md-8">
                                <div id="panel-1" class="panel">
                                    
									
                                    <div class="panel-container show">
                                        <div class="panel-content">
											
											<form action="http://<?=ROOT_APP_URL;?>/makeNewThread/<?=$forumid;?>" method="post">
											
												<input type="hidden" value="<?=$_SESSION['user']->username;?>" name="UserName">
												
												
											<div class="form-group">
                                                <div class="input-group bg-white shadow-inset-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0">
                                                            <i class="fal fa-podcast"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control border-left-0 bg-transparent pl-0" placeholder="Title" name="ThreadName">
                                                </div>
                                                <span class="help-block">Some help content goes here</span>
                                            </div>
                                            <textarea class="js-summernote" id="saveToLocal" name="content"></textarea>
                                            <div class="mt-2 clearfix">
                                                <div class="custom-control mt-3 custom-checkbox float-left">
                                                    <input type="checkbox" class="custom-control-input" id="autoSave" checked="checked">
                                                    <label class="custom-control-label" for="autoSave">Autosave changes to LocalStorage <span class="fw-300">(every 3 seconds)</span></label>
                                                </div>
												<div class="float-right">
												<button class="btn btn-light">Send</button>
												</div>
                                            </div>
												
											</form>
												
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </main>
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>

<?php
app\Page::lowerContent(false,true);
?>