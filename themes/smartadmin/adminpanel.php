<?php

use Aplikacja as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);


?><style>
    .w {
        width: 100px;
    }
</style>
					
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item active">Panel Admina</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ol>
                        <div class="subheader">
                            <h1 class="subheader-title">
                                <i class='subheader-icon fal fa-window'></i> PANEL ADMINA
                                <small>
                                    Jesteś zalogowany jako: Administrator
                                </small>
                            </h1>
                        </div>
                        <div class="ie-only alert alert-danger d-none">
                            <h4>This message is visible to IE users only!</h4>
                            <p>
                                This specific layout structure you are trying to view is buggy on Internet Explorer, which may cause the container to stretch. This is a bug within flexbox and IE, unfortunately there is no direct solution. The workaround would be to contain the box with <code>.d-block</code> and <code>.position-absolute</code> with defined width <code>.w-100</code> and height <code>.h-100</code>. To see a working example of this, check out our <a href="page_inbox_general.html" target="_blank"> Inbox page </a> which uses the same layout structure with a bit of tweaking.
                            </p>
                        </div>
						
				<ul class="nav nav-pills" role="tablist">
					<li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#general">Users - general info</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="pill" href="#site-settings">Site preferences</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="pill" href="#nav_pills_default-3">Logs</a></li>
                </ul>		<br>
						
						
						<div id="panel-12" class="panel">
   					
			<div class="panel-content">
                                            <div class="tab-content p-3">
                                            <div class="tab-pane fade active show" id="general" role="tabpanel">
											<div class="frame-wrap pe-0 border-0 m-0">
												<form method="post" action="/searchUserAdmin">
												<div class="input-group col-sm-3 ">
													<input data-action="toggle" name="searchAnything" type="text" class="form-control form-control-sm shadow-inset-4" id="" placeholder="Find User by anything">
													<div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fal fa-search fs-sm"></i>
                                                        </div>
                                                    </div>
												</div></form><span class="color-info-50">% - dolony ciąg znaków, _ - dowolny jeden znak, banned - zbanowani</span>
												<?php Aplikacja\Messages::flashMessages(); ?>
												<div style="text-align: center"><a href="http://<?=ROOT_APP_URL;?>/AdminPanel"><span style="vertical-align: middle">Go back to full list</span></a></div>
                                                <div class="page-content" style="overflow: scroll; overflow: auto; display: block">
											<?php 
												if(isset($UserResults)){
													echo"
													<table class=\"table m-0 table-sm table-hover table-striped\" id=\"table-users\">
                                                <thead>
                                                    <tr class=\"\" style=\"background-color: WhiteSmoke \">
                                                        <th>#id</th><!--dodaj ip i zmniejsz is banned na ban i is active na actived?-->
														<th>Username</th>
                                                        <th>Email</th>
														<th>PayPal</th>
                                                        <th>Imie</th>
														<th>Nazwisko</th>
                                                        <th>Country</th>
														<th></th>Created</th>
														<th>Last online</th>
														<th>Active?</th>
														<th>Ban time</th>
														<th>IP reg.</th>
														<th>NSLT</th>
                                                        <th>Role</th>														
														<!--<th>Manage</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody class=\"\" style=\"background-color: AliceBlue \">";
												foreach ($UserResults as $userfind){ 
												if(empty($userfind['country']))  $userfind['country']="";
												if(empty($userfind['miato']))  $userfind['miasto']="";
                                                    echo"<tr>
                                                        <td class=\"py-0\">".$userfind['id']."</td>
                                                        <td class=\"py-0\">".$userfind['username']."</td>
                                                        <td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/adminChangeEmail&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input minlenght&quot;2&quot; maxlength=&quot;64&quot; name=&quot;email&quot; type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
									<input type=&quot;hidden&quot; name=&quot;id&quot; value=&quot;".$userfind['id']."&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$userfind['email']."</button>
															</td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">metus.Aliquam@ametlorem.ca</button></td>
                                                        <td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$userfind['imie']."</button></td>
                                                        <td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$userfind['nazwisko']."</button></td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$userfind['country']."</button></td>
														<td class=\"py-0\">".$userfind['date_created']."</td>
														<td class=\"py-0\">2019-10-02 22:32:05</td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$userfind['is_activated']."</button></td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$userfind['banned_until']."</button></td>
														<td class=\"py-0\">127.0.0.1</td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class=&quot;fw-500 width-sm&quot;><i class=&quot;fal fa-file-check mr-2&quot;></i>Change e-mail</h6>\">".$userfind['newsletter']."</button></td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class=&quot;fw-500 width-sm&quot;><i class=&quot;fal fa-file-check mr-2&quot;></i>Admin rights</h6>\">".$userfind['RoleID']."</button></td>
													<!--	<td style=\"width: 20px\">
															<div class=\"btn-group dropleft\">
															<button type=\"button\" class=\"btn btn-xs btn-light waves-effect waves-themed dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Edit</button>
																<div class=\"dropdown-menu p-0\" x-placement=\"bottom-start\" style=\"position: absolute; will-change: top, left; top: 37px; left: 0px;\">
																	
																	<div class=\"dropdown-header bg-danger-900 bg-info-gradient d-flex flex-row px-4 py-4 rounded-top text-white\">
                                                            		<div class=\"d-flex flex-row align-items-center mt-1 mb-1 color-white\">
                                                              		<span class=\"mr-2\">
                                                                    <img src=\"img/demo/avatars/avatar-admin.png\" class=\"rounded-circle profile-image\" alt=\"Dr. Codex Lantern\">
                                                                	</span>
                                                                	<div class=\"info-card-text\">
                                                                    <div class=\"fs-lg text-truncate text-truncate-lg\">".$userfind['username']."</div>
                                                                    <span class=\"text-truncate text-truncate-md opacity-80\">zarobione pieniadze</span>
                                                                	</div>
                                                            		</div>
                                                        			</div>
																	<a class=\"dropdown-item\" href=\"http://".ROOT_APP_URL."/profile/".$userfind['username']."\">Pokaż profil</a>
																	<a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\".edycja-danych\">Edycja danych</a>	
																	<a class=\"dropdown-item\" href=\"#\">Przyznaj prawa admina</a>
																	<a class=\"dropdown-item\" href=\"#\">Zmien haslo</a>
																	<a class=\"dropdown-item\" href=\"#\">Aktywuj</a>
																	<div class=\"dropdown-divider\"></div>
																	<a class=\"dropdown-item\" href=\"#\">Zablokuj/Odblokuj</a>
																	
                                                       			</div>
															</div>
														</td> -->
													</tr>";}echo"
													 </tbody>
                                            </table>";
												}
												
												if(isset($listaUserow)){ echo"
												
                                            
                                            <table class=\"table m-0 table-sm table-hover table-striped\" id=\"table-users\">
                                                <thead>
                                                    <tr class=\"\" style=\"background-color: WhiteSmoke \">
                                                        <th>#id</th><!--dodaj ip i zmniejsz is banned na ban i is active na actived?-->
														<th>Username</th>
                                                        <th>Email</th>
														<th>PayPal</th>
                                                        <th>Imie</th>
														<th>Nazwisko</th>
                                                        <th>Country</th>
														<th>Created</th>
														<th>Last online</th>
														<th>Active?</th>
														<th>Ban time</th>
														<th>IP reg.</th>
														<th>NSLT</th>
                                                        <th>Role</th>														
														<!--<th>Manage</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody class=\"\" style=\"background-color: AliceBlue \">";
												foreach ($listaUserow as $user){ 
												if(empty($user['country']))  $user['country']="";
												if(empty($user['miato']))  $user['miasto']="";
                                                    echo"<tr>
                                                        <td class=\"py-0\">".$user['id']."</td>
                                                        <td class=\"py-0\">".$user['username']."</td>
                                                        <td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/adminChangeEmail&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input minlenght&quot;2&quot; maxlength=&quot;64&quot; name=&quot;email&quot; type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
									<input type=&quot;hidden&quot; name=&quot;id&quot; value=&quot;".$user['id']."&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$user['email']."</button>
															</td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">metus.Aliquam@ametlorem.ca</button></td>
                                                        <td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$user['imie']."</button></td>
                                                        <td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$user['nazwisko']."</button></td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$user['country']."</button></td>
														<td class=\"py-0\">".$user['date_created']."</td>
														<td class=\"py-0\">2019-10-02 22:32:05</td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$user['is_activated']."</button></td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class='fw-500 width-sm'><i class='fal fa-file-check mr-2'></i>Change e-mail</h6>\">".$user['banned_until']."</button></td>
														<td class=\"py-0\">127.0.0.1</td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class=&quot;fw-500 width-sm&quot;><i class=&quot;fal fa-file-check mr-2&quot;></i>Change e-mail</h6>\">".$user['newsletter']."</button></td>
														<td class=\"py-0\">
															<button type=\"button\" class=\"btn btn-md margin-0 py-0\" data-toggle=\"popover\" data-placement=\"top\" title=\"\" data-html=\"true\" data-content=\"
															<form action=&quot;/changeEmailAdmin&quot; method=&quot;post&quot;>
							<div class=&quot;mb-0&quot;>
								<div class=&quot;custom-control &quot;>
									<input type=&quot;text&quot; class=&quot;form-control form-control-sm&quot; id=&quot;&quot; placeholder=&quot;Change e-mail&quot;>
								</div>
							</div>
							<hr>
							<div class=&quot;d-flex&quot;>
								<button class=&quot;btn btn-primary text-white ml-auto&quot;>Change</button></form>\" data-original-title=\"<h6 class=&quot;fw-500 width-sm&quot;><i class=&quot;fal fa-file-check mr-2&quot;></i>Admin rights</h6>\">".$user['RoleID']."</button></td>
													<!--	<td style=\"width: 20px\">
															<div class=\"btn-group dropleft\">
															<button type=\"button\" class=\"btn btn-xs btn-light waves-effect waves-themed dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Edit</button>
																<div class=\"dropdown-menu p-0\" x-placement=\"bottom-start\" style=\"position: absolute; will-change: top, left; top: 37px; left: 0px;\">
																	
																	<div class=\"dropdown-header bg-danger-900 bg-info-gradient d-flex flex-row px-4 py-4 rounded-top text-white\">
                                                            		<div class=\"d-flex flex-row align-items-center mt-1 mb-1 color-white\">
                                                              		<span class=\"mr-2\">
                                                                    <img src=\"img/demo/avatars/avatar-admin.png\" class=\"rounded-circle profile-image\" alt=\"Dr. Codex Lantern\">
                                                                	</span>
                                                                	<div class=\"info-card-text\">
                                                                    <div class=\"fs-lg text-truncate text-truncate-lg\">".$user['username']."</div>
                                                                    <span class=\"text-truncate text-truncate-md opacity-80\">zarobione pieniadze</span>
                                                                	</div>
                                                            		</div>
                                                        			</div>
																	<a class=\"dropdown-item\" href=\"http://".ROOT_APP_URL."/profile/".$user['username']."\">Pokaż profil</a>
																	<a class=\"dropdown-item\" href=\"#\" data-toggle=\"modal\" data-target=\".edycja-danych\">Edycja danych</a>	
																	<a class=\"dropdown-item\" href=\"#\">Przyznaj prawa admina</a>
																	<a class=\"dropdown-item\" href=\"#\">Zmien haslo</a>
																	<a class=\"dropdown-item\" href=\"#\">Aktywuj</a>
																	<div class=\"dropdown-divider\"></div>
																	<a class=\"dropdown-item\" href=\"#\">Zablokuj/Odblokuj</a>
																	
                                                       			</div>
															</div>
														</td> -->
													</tr>";
													}
                                               echo" </tbody>
                                            </table>
												"; }?>
                                                </div>


                                        </div>
                                                </div>
                                            <div class="tab-pane fade" id="site-settings" role="tabpanel">
                                                <div class="col-12 col-lg-8 offset-md-2">
                                                    <div class="row">
                                                        @IF(FORUM_INSTALLED > 0)
                                                        <div class="col-6">Rangi:</div>
                                                        <div class="col-6">


                                                                @$rangi = \Aplikacja\Forum::showAllRangsAdmin()
                                                                @$si=0
                                                                @$zi=0
                                                                @foreach($rangi as $ranga)


                                                                    @if($ranga['special']=="yes")
                                                                        @$si++
                                                                        @if($si==1)
                                                            <div class='text-center'>SPECIAL RANGS:</div><br>
                                                                        @ENDIF
                                                            <div style="background-color: #EEF5F9">{{$ranga['nazwa']}} - <a href="http://{{ROOT_APP_URL}}/deleteRang?id={{$ranga['id']}}"><b><span style="color: darkred">DELETE</span></b></a><br>

                                                                        @if($ranga['image']!=NULL)
                                                                            <img src="http://{{ROOT_APP_URL}}/IMAGES/rangs/{{$ranga['image']}}" style="max-width: 100px; max-height: 100px;"><br>
                                                                        @ENDIF
                                                                        <form action="http://{{ROOT_APP_URL}}/changeRangImage" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" name="id" value="{{$ranga['id']}}">
                                                                            <input type="file" name="image">
                                                                            <input type="hidden" name="nazwa" value="{{$ranga['nazwa']}}">
                                                                            <input type="hidden" name="special" value="{{$ranga['special']}}">
                                                                            <input type="hidden" name="post_amount_needed" value="{{$ranga['post_amount_needed']}}">
                                                                            <button>change image</button>
                                                                        </form>
                                                                     </div><hr>
                                                                    @ELSE
                                                                        @$zi++
                                                                        @if($zi==1) <div class='text-center'>FORUM RANGS:</div><br> @ENDIF
                                                                        {{$ranga['nazwa']}} - <span style="color: darkred"><a href="http://{{ROOT_APP_URL}}/deleteRang?id={{$ranga['id']}}"><b><span style="color: darkred">DELETE</span></b></a></span><br>

                                                                        @if($ranga['image']!=NULL)
                                                                            <img src="http://{{ROOT_APP_URL}}/IMAGES/rangs/{{$ranga['image']}}" style="max-width: 100px; max-height: 100px;"><br>
                                                                        @ENDIF
                                                                    <form action="http://{{ROOT_APP_URL}}/changeRangImage" method="post" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id" value="{{$ranga['id']}}">
                                                                        <input type="file" name="image">
                                                                        <input type="hidden" name="nazwa" value="{{$ranga['nazwa']}}">
                                                                        <input type="hidden" name="special" value="{{$ranga['special']}}">
                                                                        <input type="hidden" name="post_amount_needed" value="{{$ranga['post_amount_needed']}}">
                                                                        <button>change image</button>
                                                                    </form>


                                                                     <form action="http://{{ROOT_APP_URL}}/changeRangNumber" method="post">
                                                                        <input type="hidden" name="id" value="{{$ranga['id']}}">
                                                                        <input type="number" value="{{$ranga['post_amount_needed']}}" name="post_amount_needed">
                                                                        <button class="btn btn-sm">change value</button>
                                                                     </form>
                                                                     <br><hr>
                                                                    @ENDIF
                                                                @ENDFOREACH
                                                                @if(empty($rangi))
                                                                    <hr>
                                                                @ENDIF

                                                        </div>
                                                        <div class="col-6">Dodaj rangę:</div>
                                                        <div class="col-6">
                                                            <form action="http://{{ROOT_APP_URL}}/addRang" method="post" enctype="multipart/form-data">
    <label>Nazwa</label>
<input type="text" name="name"><br>
    <label>Rang image (optional)</label>
<input type="file" name="rang_img"><br>
    <label>Number of posts from which the rang will be shown<br> EMPTY for special rang (given for a certain people)</label>
    <input type="number" name="post_amount_needed"><br>
    <button>SEND</button>
</form>
                                                        </div>
                                                    </div>
                                                    @ENDIF
                                                </div>
                                                <div class="col-12 col-lg-10 offset-md-2 d-flex">

                                                </div>
                                            </div>
                                                <div class="tab-pane fade" id="tab_default-3" role="tabpanel">
                                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.
                                                </div>
                                            </div>
                                        </div>
						  </div>
						
						
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> 
					
					
					
					
					
					
					
					
					
					
					
					

  			<?php
			//require_once("themes/smartadmin/includes/_page_footer.php");
			?>

			<?php
					//require_once("themes/smartadmin/includes/_skroty.php");
			?>
    
  			<?php
			require_once("themes/smartadmin/includes/_color_stuuf.php");
			?>
                  
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
       
			<?php
					//require_once("themes/smartadmin/includes/_quick_menu.php");
			?>
		

			<?php
			require_once("themes/smartadmin/includes/_messenger.php");
			?>

			<?php
			require_once("themes/smartadmin/includes/_ustawienia.php");
			?>

			<?php
			require_once("themes/smartadmin/includes/_end_page_settings.php");
			?>
		<script>
            initApp.listFilter($('#js_user_list'), $('#js_user_list_filter'));
		</script>
        
    </body>
</html>