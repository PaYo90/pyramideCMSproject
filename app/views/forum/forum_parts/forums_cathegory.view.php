<div class="card mb-g border shadow-0">
                                    <div class="card-header bg-white">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col"><?php if($_SESSION['user']->isAdmin()){?>
												<a href="#" class="text-danger" data-toggle="modal" data-target="#delete-category-modal-<?=$kategoria['id'];?>"><i class="fa fa-times-circle "></i>&nbsp;&nbsp;</a><?php }?>
                                                <span class="h6 font-weight-bold text-uppercase"><?=$kategoria['name'];?></span>
                                            </div>
                                            <div class="col d-flex">
                                                <a href="http://<?=ROOT_APP_URL;?>/dodajForum?katid=<?=$kategoria['id'];?>" class="btn btn-outline-info btn-sm ml-auto mr-2 flex-shrink-0">Dodaj Forum</a>
												<a href="http://<?=ROOT_APP_URL;?>/edycjaKategorii?katid=<?=$kategoria['id'];?>" class="btn btn-outline-dark btn-sm mr-2 flex-shrink-0">Edycja Kategorii</a>
                                            </div>
                                        </div>
                                    </div>
	<!-- MODAL -->
							<div class="modal modal-alert fade" id="delete-category-modal-<?=$kategoria['id'];?>" tabindex="-1" role="dialog" style="display: none" aria-modal="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete: <?=$kategoria['name'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure? With category will be deleted all of forums pined to it. Maybe first you want to move them?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">STOP!</button>
                                                            <a href="http://<?=ROOT_APP_URL;?>/deleteKat?id=<?=$kategoria['id'];?>&kol=<?=$kategoria['kolejnosc'];?>" class="btn btn-primary waves-effect waves-themed">Go Ahead..</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
	<!-- END MODAL -->
                                    <div class="card-header bg-white p-0">
                                        <div class="row no-gutters row-grid align-items-stretch">
                                            <div class="col-12 col-md">
                                                <div class="text-uppercase text-muted py-2 px-3">Title</div>
                                            </div>
                                            <div class="col-sm-6 col-md-2 col-xl-1 hidden-md-down">
                                                <div class="text-uppercase text-muted py-2 px-3">Status</div>
                                            </div>
                                            <div class="col-sm-6 col-md-3 hidden-md-down">
                                                <div class="text-uppercase text-muted py-2 px-3">Last posts</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="row no-gutters row-grid">
                                            <!-- thread start -->
											
											<?php 
											$forumHandler = new Aplikacja\Forum();
											$forums = $forumHandler -> pobierzForum($kategoria['id']);

											if($forums){
												foreach($forums as $forum){
													include('app/views/forum/forum_parts/forums.view.php'); 
												}
											}
											?>
											
											
											<!-- thread end -->
                                        </div>
                                    </div>
                                </div>