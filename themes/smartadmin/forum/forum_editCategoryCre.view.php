<?php

use Aplikacja as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);

?>
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item">MAIN</li>
                            <li class="breadcrumb-item">Forum</li>
                            <li class="breadcrumb-item active">Make New Category</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon fal fa-plus-circle'></i> Forum: <span class='fw-300'>Edit Existing Category</span>
                                <small>
                                    Administration restricted page
                                </small>
                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-4 clearfix">
								<form action="http://<?=ROOT_APP_URL;?>/editCategory" method="post">
									<label class="form-label">Category Name</label>
									<input type="text" class="form-control" name="CatNewName" maxlength="64" value="<?=$info['name'];?>"><br>
									<label clas="form-label">Category Description</label>
									<input type="text" class="form-control" name="CatNewDesc" maxlength="255" value="<?=$info['opis'];?>"><br>
									<label class="form-label">Change category order</label>
									
									<select name="CatNewNumber" class="custom-select form-control">
										<?php 
										$numerekOstatni=0;
										foreach ($numerki as $numerek){
											if($numerek['kolejnosc']==$info['kolejnosc']){
												echo '<option value="'.$numerek['kolejnosc'].'" selected>'.$numerek['kolejnosc'].'</option>';
												$numerekOstatni = $numerek['kolejnosc'];
											}else{
                                        		echo '<option value="'.$numerek['kolejnosc'].'">'.$numerek['kolejnosc'].'</option>';
												$numerekOstatni = $numerek['kolejnosc'];
											}
										}
										?>
										<input type="hidden" name="CatOldNumber" value="<?=$info['kolejnosc'];?>">
										<input type="hidden" name="CatId" value="<?=$info['id'];?>">
                                    	</select>
									<br><br>
									<a href="http://<?=ROOT_APP_URL;?>/forum" class="btn btn-outline-danger float-left">Cancel</a>
									<button class="btn btn-outline-success float-right">Save Changes!</button>
								</form>
                            </div>
                        </div>
						
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content --><?php

app\Page::lowerContent();

?>