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
                            <li class="breadcrumb-item active">Make New Forum</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon fal fa-plus-circle'></i> Forum: <span class='fw-300'>Make New Category</span>
                                <small>
                                    Administration restricted page
                                </small>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-4 clearfix">
								<form action="http://<?=ROOT_APP_URL;?>/makeNewForum" method="post">
									<label class="form-label">Under Category:</label>
									<fieldset disabled>
									<input type="text" class="form-control" maxlength="64" value="<?php echo Aplikacja\Forum::selectCatNameById($underCategory); ?>"></fieldset><br>	
									<label class="form-label">Forum Name</label>
									<input type="text" class="form-control" name="ForumName" maxlength="64" placeholder="Default forum Name"><br>
									<label clas="form-label">Forum Description</label>
									<input type="text" class="form-control" name="ForumDesc" maxlength="255" placeholder="Default forum Description"><br>
									<label class="form-label">FORUM NUMBER</label>									
									<select name="ForumNumber" class="custom-select form-control">
										<?php 
										$numerekOstatni=0;
										foreach ($numerki as $numerek){
                                        	echo '<option value="'.$numerek['kolejnosc'].'">'.$numerek['kolejnosc'].'</option>';
											$numerekOstatni = $numerek['kolejnosc'];
											
										}
										echo '<option selected value="'.++$numerekOstatni .'">'.$numerekOstatni .'</option>';
										?>
										
                                    	</select>	
									<label clas="form-label">Icon HTML</label>
									<input type="text" class="form-control" name="Icon" maxlength="255" placeholder=""><br>
									
									
									<input type="hidden" value="<?=$this->get['katid'];?>" name="KatID">
									
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