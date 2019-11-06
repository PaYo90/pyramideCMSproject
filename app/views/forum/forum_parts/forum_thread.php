<div class="col-12">
                                                <div class="row no-gutters row-grid align-items-stretch">
                                                    <div class="col-md">
                                                        <div class="p-2">
															<!--avatar dla topicu przed forum-->
															<!--<div class="d-inline-flex align-middle mr-2">
                                                                    <span class="profile-image-md d-block" style="background-image:url('http://<?php //echo ROOT_APP_URL;?>/img/demo/avatars/avatar-admin.png'); background-size: cover;"></span>
                                                            </div>-->
                                                            <div class="d-flex flex-column">
																<a href="http://<?=ROOT_APP_URL;?>/thread/<?=$thread['id'];?>/1" class="fs-lg fw-500 d-flex align-items-start">
                                                                    <?=$thread['name'];?>
																	<?php if($thread['sticky'] > 0) {echo " <span class=\"badge badge-warning ml-auto\">Sticky</span>";} ?>
                                                                </a>
                                                                <div class="d-block text-muted fs-sm">
                                                                    Started by <a href="javascript:void(0);" class="text-info"><?=$thread['author'];?> </a> on <?=$thread['made_date'];?> 
                                                                </div>
                                                            </div>
															<?php if($pagesnbr>1){ ?>
                                                            <div class="d-flex">
                                                                <ul class="pagination pagination-xs mb-0 mt-3 align-self-end">
                               	<?php
									//PAGINATION
									$paginationButtonShow = true;
	
									for($i=1; $i <= $pagesnbr; $i++){ 
									
									if($i <= 3){
										echo '<li class="page-item"><a class="page-link" href="http://'.ROOT_APP_URL.'/thread/'.$thread['id'].'/'.$i.'">'.$i.'</a></li>';
									}elseif($pagesnbr > 6 && $i < $pagesnbr - 2 && $paginationButtonShow == true){
										echo '<li class="paginate_button page-item px-0">sdf</li>';
										$paginationButtonShow = false;
									}elseif($i == $pagesnbr-1 || $i == $thread['pages']-2){
										echo '<li class="page-item"><a class="page-link" href="http://'.ROOT_APP_URL.'/thread/'.$thread['id'].'/'.$i.'">'.$i.'</a></li>';
									}else{
										echo '<li class="page-item">';
											echo '<a class="page-link" href="http://'.ROOT_APP_URL.'/thread/'.$thread['id'].'/'.$i.'" aria-label="Next">';
											echo '<span aria-hidden="true">Last page</span>';
                                            echo '</a>';
                                        echo '</li>';
									}
									}?>
                                                                    
                                                                   
                                    
                                                                </ul>
                                                            </div>
															<?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                                        <div class="p-2 p-md-2">
                                                            <span class="d-block text-muted"><?=$postsnumber['posts_quantity'];?>  <i>Replies</i></span>
                                                            <span class="d-block text-muted"><?=$thread['views'];?>  <i>Views</i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-md-3 hidden-md-down">
                                                        <div class="p-2 p-md-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-inline-block align-middle status status-success status-sm mr-2">
                                                                    <span class="profile-image-md rounded-circle d-block" style="background-image:url('http://<?=ROOT_APP_URL;?>/img/demo/avatars/avatar-admin.png'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="flex-1 min-width-0">
                                                                    <a href="javascript:void(0)" class="d-block text-truncate">
                                                                        <?php echo substr(strip_tags($thread['post_content']),0,50)."...";?> 
                                                                    </a>
                                                                    <div class="text-muted small text-truncate">
                                                                        <?=$thread['last_post'];?>  <a href="javascript:void(0)" class="text-info"><?=$thread['post_author'];?> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>