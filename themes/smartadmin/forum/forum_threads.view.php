<?php
use Aplikacja as app;
app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);
?>
<main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="http://{{ROOT_APP_URL}}"><?=ROOT_APP_URL;?></a></li>
                            <li class="breadcrumb-item">Forum</li>
                            <li class="breadcrumb-item active"></li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">Sunday, October 20, 2019</span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class="subheader-icon fal fa-plus-circle"></i> Forum: <span class="fw-300">NAZWA FORUM</span>
                                <small>
                                    OPIS FORUM
                                </small>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="input-group input-group-lg mb-g">
                                    <input type="text" class="form-control shadow-inset-2" placeholder="Search Threads">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fal fa-search"></i></span>
                                    </div>
                                </div>
                                <div class="card mb-g border shadow-0">
                                    <div class="card-header bg-white">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <span class="h6 font-weight-bold text-uppercase">ZNOWU NAZWA FORUM</span>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <a href="http://<?=ROOT_APP_URL;?>/newThread/<?=$forumid;?>" class="btn shadow-0 btn-sm ml-auto flex-shrink-0 waves-effect waves-themed bg-primary-200">New Thread</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header bg-white p-0">
                                        <div class="row no-gutters row-grid align-items-stretch">
                                            <div class="col-12 col-md">
                                                <div class="text-uppercase text-muted py-2 px-3">Title</div>
                                            </div>
                                            <div class="col-sm-6 col-md-2 col-xl-1 hidden-md-down">
                                                <div class="text-uppercase text-muted py-2 px-3">Replies</div>
                                            </div>
                                            <div class="col-sm-6 col-md-3 hidden-md-down">
                                                <div class="text-uppercase text-muted py-2 px-3">Last update</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="row no-gutters row-grid">
                                            <!-- thread -->
                                           <?php
											
											foreach($threads as $thread){
												$postsnumber = $forum->countPosts($thread['id']);
												$pagesnbr = ceil($postsnumber['posts_quantity'] / FORUM_PAGE_OFFSET);
												include('themes/smartadmin/forum/forum_parts/forum_thread.php');
											}
											?>
                                            <!-- thread -end -->
                                           
                                        </div>
                                    </div>
                                </div>
								
								
                                <?php
								
								if($paginationpages>1){
									
									echo'
									<ul class="pagination mt-3">';
										
									echo '
									<li class="page-item ';	if($forumpage==1) { echo 'disabled'; } echo'">
											<a class="page-link" href="http://'.ROOT_APP_URL.'/forum/'.$forumid.'/'.--$forumpage.'" aria-label="Previous">
												<span aria-hidden="true"><i class="fal fa-chevron-left"></i></span>
											</a>
										</li>';
										
										for($i=1; $i <= $paginationpages; $i++){
											
											if($i==$forumpage+1){
												echo '
												<li class="page-item active" aria-current="page">
													<span class="page-link">
														'.$i.'
														<span class="sr-only">(current)</span>
													</span>
												</li>
												';
											}else{
												echo '<li class="page-item"><a class="page-link" href="http://'.ROOT_APP_URL.'/forum/'.$forumid.'/'.$i.'">'.$i.'</a></li>';
											}
											
										}
										
										if($forumpage+1<$paginationpages){
											$page_id_next = $forumpage + 2;
											echo '<li class="page-item">
													<a class="page-link" href="http://'.ROOT_APP_URL.'/forum/'.$forumid.'/'.$page_id_next.'" aria-label="Next">
													<span aria-hidden="true"><i class="fal fa-chevron-right"></i></span>
													</a>
												</li>';
										}
									echo '</ul>';
									
									
								}
								
								?>
								
								
                            </div>
                        </div>
                    </main>
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
<?php
app\Page::lowerContent();
?>