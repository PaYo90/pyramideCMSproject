<?php

use Aplikacja\In as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);

?>
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item">MAIN</li>
                            <li class="breadcrumb-item">Forum</li>
                            <li class="breadcrumb-item active">Make existing Forum</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon fal fa-plus-circle'></i> Forum: <span class='fw-300'>Edit existing Forum</span>
                                <small>
                                    Administration restricted page
                                </small>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-4 clearfix">
								<a href="#" class="btn btn-danger float-left" data-toggle="modal" data-target="#delete-forum-modal-<?=$forumInfo['id'];?>">Delete</a><br><br><br>
								
								<div class="modal modal-alert fade" id="delete-forum-modal-<?=$forumInfo['id'];?>" tabindex="-1" role="dialog" style="display: none" aria-modal="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete: <?=$forumInfo['name'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure? With forum will be deleted all of forum topics written in. Maybe first you want to move them?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">STOP!</button>
                                                            <a href="http://<?=ROOT_APP_URL;?>/deleteForum?id=<?=$forumInfo['id'];?>&kolejnosc=<?=$forumInfo['kolejnosc'];?>" class="btn btn-primary waves-effect waves-themed">Go Ahead..</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
								
								<form action="http://<?=ROOT_APP_URL;?>/changeCategory" method="post">
								<label class="form-label">Move Under New Category:</label>
									
									<select name="NewKatID" class="custom-select form-control">
										<?php
										foreach ($kategorie as $kategoria){
											if($kategoria['id']==$this->get['katid']){
												echo '<option value="'.$kategoria['id'].'" selected>'.$kategoria['name'].'</option>';
											}else{
                                        		echo '<option value="'.$kategoria['id'].'">'.$kategoria['name'].'</option>';									
											}
										}
										?>
										
                                    	</select><br><br>
									
									<input type="hidden" value="<?=$forumInfo['id'];?>" name="ForumID">
									<input type="hidden" value="<?=$this->get['katid'];?>" name="OldKatID">
									
									<button class="btn btn-outline-success btn-xs float-right">Change</button><br><br>
								</form>
								
								<form action="http://<?=ROOT_APP_URL;?>/editForum" method="post">									
									<label class="form-label">Forum New Name</label>
									<input type="text" class="form-control" name="ForumNewName" value="<?=$forumInfo['name'];?>" maxlength="64" ><br>
									<label clas="form-label">Forum New Description</label>
									<input type="text" class="form-control" name="ForumNewDesc" value="<?=$forumInfo['description'];?>" maxlength="255" ><br>
									<label class="form-label">Forum New Order Number</label>									
									<select name="ForumNewNumber" class="custom-select form-control">
										<?php 
										foreach ($numerki as $numerek){
                                        	echo '<option value="'.$numerek['kolejnosc'].'">'.$numerek['kolejnosc'].'</option>';
											
										}
										?>
										
                                    	</select>	<br><br>
									<label clas="form-label">Icon HTML</label>
									<input type="text" class="form-control" value="<?=$icon;?>" name="NewIcon" >
									<span>Add -&nbsp;&nbsp; <span class="color-success-600">display-4 mr-3 flex-shrink-0</span> &nbsp;&nbsp;- to div class for proper size</span><br><br>
									
									<input type="hidden" value="<?=$forumInfo['kolejnosc'];?>" name="ForumOldNumber">
									<input type="hidden" value="<?=$forumInfo['id'];?>" name="ForumID">
									
									<a href="http://<?=ROOT_APP_URL;?>/forum" class="btn btn-outline-danger float-left">Cancel</a>
									<button class="btn btn-outline-success float-right">Make Me!</button>
									
								</form>
								
                            </div>
							<div class="col-12"><br>
								<?php
								require_once("forum_parts/icon_generator.php");
								?>
									</div>
                        </div>
						
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->

<?php

app\Page::lowerContent(true);

?>