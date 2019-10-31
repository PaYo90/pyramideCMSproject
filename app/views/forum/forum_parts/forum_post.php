
                                <div name="<?=$post['id'];?>" class="card mb-g border shadow-0">
                                    <div class="card-header bg-white p-0">
                                        <div class="p-3 d-flex flex-row">
                                            <div class="d-block flex-shrink-0">
                                                <img src="http://<?=ROOT_APP_URL;?>/img/demo/avatars/avatar-admin.png" class="img-fluid img-thumbnail" alt="">
                                            </div>
                                            <div class="d-block ml-2">
                                                <span class="h6 font-weight-bold text-uppercase d-block m-0"><a href="javascript:void(0);"><span class="fw-300"><?=$post['name'];?></span></a> </span>
                                                <a href="javascript:void(0);" class="fs-sm text-info h6 fw-500 mb-0 d-block"><?=$post['author'];?></a>
                                                <div class="d-flex mt-1 text-warning align-items-center">
                                                    <i class="fas fa-star mr-1"></i>
                                                    <i class="fas fa-star mr-1"></i>
                                                    <i class="fas fa-star mr-1"></i>
                                                    <i class="fas fa-star mr-1"></i>
                                                    <i class="fal fa-star mr-1"></i>
                                                    <span class="text-muted fs-xs font-italic">
                                                        Rang name
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="http://<?=ROOT_APP_URL;?>/like/<?=$post['id'];?>/<?=$post['t_id'];?>" class="d-inline-flex align-items-center text-dark ml-auto align-self-start">
                                                <span><?=$post['likes'];?></span>
												<?php
												if($PHandler->checkIfLiked($post['id'])){
													echo '<i class="fal fa-heart ml-1 text-muted"></i>';
												}else{
													echo '<i class="fas fa-heart ml-1 text-danger"></i>';
												}
												?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <p>
                                            <?=$post['content'];?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center">
                                            <span class="text-sm text-muted font-italic"><i class="fal fa-clock mr-1"></i> Posted 1 week ago</span>
                                            <a href="javascript:void(0);" class="flex-shrink-0 ml-auto">Reply <i class="fal fa-reply ml-2"></i> </a>
                                        </div>
                                    </div>
                                </div>