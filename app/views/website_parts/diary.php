<div class="tab-pane fade <?=$profile_active;?>" id="profile" role="tab_panel">
    <?php
        if($row['allow_others_to_write_on_in_my_diary']==1 OR $row['id']==$_SESSION['user']->id) {
            ?>
            <div class="card border mb-g">
                <div class="card-body pl-4 pt-4 pr-4 pb-0">
                    <div class="d-flex flex-column">
                        <form action="http://<?= ROOT_APP_URL; ?>/addInscription" method="post">
                            <div class="border-0 flex-1 position-relative shadow-top">
                                <!--TODO check co to znaczy form-control i inne znaczenia dla rej foremki-->

                                <div class="pt-2 pb-1 pr-0 pl-0 rounded-0 position-relative" tabindex="-1">
                                    <span class="profile-image rounded-circle d-block position-absolute"
                                          style="background-image:url('<?= "http://" . ROOT_APP_URL . "/img/demo/avatars/avatar-admin.png"; ?>'); background-size: cover;"></span>
                                    <div class="pl-5 ml-5">
                                        <textarea id="new_post" class="form-control border-0 p-0 fs-xl" name="diary_inscription"
                                                  placeholder="What's on your mind <?= $_SESSION[ 'user' ]->imie; ?>?..."
                                                  rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="height-8 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                                <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1"
                                   data-toggle="tooltip" data-original-title="More options" data-placement="top">
                                    <i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip"
                                   data-original-title="Attach files" data-placement="top">
                                    <i class="fal fa-paperclip color-fusion-300"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip"
                                   data-original-title="Insert photo" data-placement="top">
                                    <i class="fal fa-camera color-fusion-300"></i>
                                </a>
                                <button class="btn btn-info shadow-0 ml-auto">Post</button>
                            </div>

                            <input type="hidden" name="autor_id" value="<?= $_SESSION[ 'user' ]->id; ?>">
                            <input type="hidden" name="desired_profile_id" value="<?= $row[ 'id' ]; ?>">

                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    <!-- post comment -->

    <?php
        $inscriptions = \Aplikacja\Diary::showPosts($row['id']);
        $i=0;
        foreach ($inscriptions as $inscription){$i++;
            $comments = \Aplikacja\Diary::showComments($inscription['id']);
            ?>
            <div class="card mb-g"><a name="<?=$inscription['id'];?>"></a>
                <div class="card-body pb-0 px-4">
                    <div class="d-flex flex-row pb-3 pt-2  border-top-0 border-left-0 border-right-0">
                        <div class="d-inline-block align-middle status status-success mr-3">
                            <span class="profile-image rounded-circle d-block" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-e.png";?>'); background-size: cover;"></span>
                        </div>
                        <h5 class="mb-0 flex-1 text-dark fw-500">
                            <?=$inscription['imie'];?>&nbsp;<?=$inscription['nazwisko'];?>
                            <small class="m-0 l-h-n">
                                Zawód
                            </small>
                        </h5>
                        <span class="text-muted fs-xs opacity-70">
                                                made date
                                            </span>
                    </div>
                    <div class="pb-3 pt-2 border-top-0 border-left-0 border-right-0 text-muted">
                        <?=$inscription['content'];?>
                    </div>
                    <div class="d-flex align-items-center demo-h-spacing py-3">
                        <a href="javascript:void(0);" class="d-inline-flex align-items-center text-dark">
                            <i class="fal fa-heart fs-xs mr-1 text-danger"></i> <span><?=$inscription['likes'];?> Likes</span>
                        </a>
                        <a href="javascript:void(0);" class="d-inline-flex align-items-center text-dark">
                            <i class="fal fa-comment fs-xs mr-1"></i> <span><?php $ilosc = \Aplikacja\Diary::howManyComments($inscription['id']); echo $ilosc['COUNT(id)'];?> Comments</span>
                        </a>
                    </div>
                </div>
                <div class="card-body py-0 px-4 border-faded border-right-0 border-bottom-0 border-left-0">
                    <div class="d-flex flex-column align-items-center">
                        <!-- comment -->
                        <?php
                            foreach ($comments as $comment){

                                ?>
                                <div class="d-flex flex-row w-100 py-4">
                                    <div class="d-inline-block align-middle status status-sm status-success mr-3">
                                        <span class="profile-image profile-image-md rounded-circle d-block mt-1" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-admin.png";?>'); background-size: cover;"></span>
                                    </div>
                                    <div class="mb-0 flex-1 text-dark">
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="text-dark fw-500">
                                                <?=$comment['imie'];?>&nbsp;<?=$comment['nazwisko'];?>
                                            </a><span class="text-muted fs-xs opacity-70 ml-auto">
                                                            3 minutes
                                                        </span>
                                        </div>
                                        <p class="mb-0">
                                            <?=$comment['content'];?>
                                        </p>
                                        <!--another comment --><!--
                                <div class="pl-0 d-flex flex-row w-100 pb-0 pt-4">
                                    <div class="d-inline-block align-middle status status-sm status-success mr-3">
                                        <span class="profile-image profile-image-md rounded-circle d-block mt-1" style="background-image:url('URL'); background-size: cover;"></span>
                                    </div>
                                    <div class="mb-0 flex-1 text-dark">
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="text-dark fw-500">
                                                Dr. John Cook PhD
                                            </a><span class="text-muted fs-xs opacity-70 ml-auto">
                                                                    30 seconds
                                                                </span>
                                        </div>
                                        <p class="mb-0">
                                            Thanks!
                                        </p>
                                    </div>
                                </div>-->


                                    </div>
                                </div>
                                <hr class="m-0 w-100">
                                <?php
                            }
                        ?>




                        <!-- comment end -->
                        <!-- add comment -->
                        <script>
                            $(function() {
                                $('#new_comment<?=$i;?>').keypress(function(event) {
                                    if (event.keyCode == '13' && !event.shiftKey) {
                                        event.preventDefault();
                                        $('#COMMENT<?=$i;?>').submit();

                                    };
                                });
                            });
                        </script>
                        <div class="py-3 w-100"><form id="COMMENT<?=$i;?>" action="http://<?=ROOT_APP_URL;?>/addCommentToInscription" method="post">
                            <textarea id="new_comment<?=$i;?>" class="form-control border-0 p-0"  name="comment" placeholder="add a comment..."
                                      rows="2"></textarea>
                            <input name="author_id" type="hidden" value="<?=$_SESSION['user']->id;?>">
                            <input name="post_id" type="hidden" value="<?=$inscription['id'];?>">
                            </form>

                        </div>

                        <!-- add comment end -->
                    </div>
                </div>
            </div>
            <?php
        }

    ?>

</div>