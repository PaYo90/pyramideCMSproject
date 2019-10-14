
											<div class="col-12">
                                                <div class="row no-gutters row-grid align-items-stretch">
                                                    <div class="col-md">
                                                        <div class="p-3">
                                                            <div class="d-flex"><?php//show stack-icon
																if($forum['ikona']!==""){ echo $forum['ikona']; } ?>
                                                                <div class="d-inline-flex flex-column">
                                                                    <a href="javascript:void(0)" class="fs-lg fw-500 d-block">
                                                                        <?=$forum['name'];?> <!--<span class="badge badge-warning rounded">Sticky</span>-->
                                                                    </a>
                                                                    <div class="d-block text-muted fs-sm">
                                                                        <?=$forum['description'];?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                                        <div class="p-3 p-md-3">
                                                            <span class="d-block text-muted">243 <i>Topics</i></span>
                                                            <span class="d-block text-muted">407 <i>Posts</i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-md-3 hidden-md-down">
                                                        <div class="p-3 p-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-inline-block align-middle status status-success status-sm mr-2">
                                                                    <span class="profile-image-md d-block" style="background-image:url('img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="flex-1 min-width-0">
                                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                                        tytul posta
                                                                    </a>
                                                                    <div class="text-muted small text-truncate">
                                                                        data <a href="javascript:void(0)" class="text-info">autor</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>