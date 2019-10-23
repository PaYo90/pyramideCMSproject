<div class="col-12">
                                                <div class="row no-gutters row-grid align-items-stretch">
                                                    <div class="col-md">
                                                        <div class="p-3">
                                                            <div class="d-flex flex-column">
                                                                <a href="javascript:void(0)" class="fs-lg fw-500 d-flex align-items-start">
                                                                    <?=$thread['name'];?> <?php if($thread['sticky'] > 0) {echo " <span class=\"badge badge-warning ml-auto\">Sticky</span>";} ?>
                                                                </a>
                                                                <div class="d-block text-muted fs-sm">
                                                                    Started by <a href="javascript:void(0);" class="text-info"><?=$thread['author'];?> </a> on <?=$thread['made_date'];?> 
                                                                </div>
                                                            </div>
                                                            <div class="d-flex">
                                                                <ul class="pagination pagination-xs mb-0 mt-3 align-self-end">
                                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                    <li class="paginate_button page-item disabled px-0">…</li>
                                                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">25</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#" aria-label="Next">
                                                                            <span aria-hidden="true">Last page</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 col-md-2 col-xl-1 hidden-md-down">
                                                        <div class="p-3 p-md-3">
                                                            <span class="d-block text-muted"><?=$thread['replies'];?>  <i>Replies</i></span>
                                                            <span class="d-block text-muted"><?=$thread['views'];?>  <i>Views</i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-8 col-md-3 hidden-md-down">
                                                        <div class="p-3 p-md-3">
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