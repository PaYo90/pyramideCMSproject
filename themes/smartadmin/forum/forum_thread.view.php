<?php
use Aplikacja as app;
app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);
?>
 <link rel="stylesheet" media="screen, print" href=<?="http://".ROOT_APP_URL."/themes/smartadmin/css/formplugins/summernote/summernote.css";?>>
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
                            <div class="col-12">
                                <div class="input-group input-group-lg mb-g">
                                    <input type="text" class="form-control shadow-inset-2" placeholder="Search Discussion">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fal fa-search"></i></span>
                                    </div>
                                </div>
                                <!-- post -->
								
								<?php
								
								foreach($posts as $post){
									
									
									include("themes/smartadmin/forum/forum_parts/forum_post.php");
								}
								
								?>
                                <!-- post -end -->
								
								<!-- PAGINATION -->
								
								<?php
								
								if($pagesnbr>1){
									
									echo'
									<ul class="pagination mt-3">';
										
									echo '
									<li class="page-item ';	if($page_id==1) { echo 'disabled'; } echo'">
											<a class="page-link" href="http://'.ROOT_APP_URL.'/thread/'.$thread_id.'/'.--$page_id.'" aria-label="Previous">
												<span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
											</a>
										</li>';
										
										for($i=1; $i <= $pagesnbr; $i++){
											
											if($i==$page_id+1){
												echo '
												<li class="page-item active" aria-current="page">
													<span class="page-link">
														'.$i.'
														<span class="sr-only">(current)</span>
													</span>
												</li>
												';
											}else{
												echo '<li class="page-item"><a class="page-link" href="http://'.ROOT_APP_URL.'/thread/'.$thread_id.'/'.$i.'">'.$i.'</a></li>';
											}
											
										}
										
										if($page_id+1<$pagesnbr){
											$page_id_next = $page_id + 2;
											echo '<li class="page-item">
													<a class="page-link" href="http://'.ROOT_APP_URL.'/thread/'.$thread_id.'/'.$page_id_next.'" aria-label="Next">
													<span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
													</a>
												</li>';
										}
									echo '</ul>';
									
									
								}
								
								?>
                                
                            </div>
							
							<!-- ANSWEAR -->
							<div class="col-12">
                                <div id="panel-1" class="panel">
                                    <a name="reply"></a>
									
                                    <div class="panel-container show">
                                        <div class="panel-content">
											<?php $forumid = \Aplikacja\Forum::pobierzIdForum($thread_id); ?>
											<form action="http://<?=ROOT_APP_URL;?>/addPost" method="post">
											
												<input type="hidden" value="<?=$thread_id;?>" name="ThreadId">
												<input type="hidden" value="<?=$forumid['forum_id'];?>" name="Forum_ID">
												<input type="hidden" value="<?=$_SESSION['user']->username;?>" name="UserName">
											
                                            <textarea class="js-summernote" id="saveToLocal" name="Content"></textarea>
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
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<?php
app\Page::lowerContent(false, true);
?>