<?php

use Aplikacja\In as app;

app\Page::upperContent($title,$ActiveMenuCategory,$ActiveMenuSubCategory);

//var_dump($edit);
if(isset($zmienne["edit"]) AND $zmienne["edit"]=="on"){
	$profile_active = "";
	$profile_edit_active = "show active";
	$profile_link_2_active = "active";
}else{
	$profile_active ="show active";
	$profile_edit_active = "";
	$profile_link_1_active = "active";
}
?><script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.1.0/react-dom.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<style>
    #new_post {
        max-height: 50vh;
    }

    #new_comment {
        max-height: 10vh;
    }
</style>
    <script>


        document.addEventListener('input', function (event) {
            if (event.target.tagName.toLowerCase() !== 'textarea') return;
            autoExpand(event.target);
        }, false);

        var autoExpand = function (field) {

            // Reset field height
            field.style.height = 'inherit';

            // Get the computed styles for the element
            var computed = window.getComputedStyle(field);

            // Calculate the height
            var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
                + parseInt(computed.getPropertyValue('padding-top'), 10)
                + field.scrollHeight
                + parseInt(computed.getPropertyValue('padding-bottom'), 10)
                + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

            field.style.height = height + 'px';

        };



    </script>
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <ul class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?=SITE_NAME;?></a></li>
                            <li class="breadcrumb-item">Profile</li>
                            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                        </ul>
                        <div class="subheader">
								<ul class="nav nav-pills" role="tablist">
                                                <li class="nav-item"><a class="nav-link <?=$profile_link_1_active;?>" data-toggle="pill" href="#profile">Profile</a></li>
                                                <li class="nav-item"><a class="nav-link <?=$profile_link_2_active;?>" data-toggle="pill" href="#profile_edit">Settings</a></li>                                          
                                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-3 order-lg-1 order-xl-1">
                                <!-- profile summary -->
                                <div class="card mb-g rounded-top">
                                    <div class="row no-gutters row-grid">
                                        <div class="col-12">
                                            <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                                <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-admin-lg.png";?>" class="rounded-circle shadow-2 img-thumbnail" alt="">
                                                <h5 class="mb-0 fw-700 text-center mt-3">
                                                    <?php echo $row['imie']. " " .$row['nazwisko'];?>
                                                    <small class="text-muted mb-0"><?php
														if($row['miasto']!=="NULL"){echo $row['miasto'].", ";}
														if($panstwo!==NULL){echo $panstwo->get();}
														if($row['miasto'] == NULL && $panstwo == NULL)
														{
															echo "World Citizen";
														}
														
														
														?></small>
                                                </h5>
                                                <div class="mt-4 text-center demo">
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#3b5998">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#38A1F3">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#db3236">
                                                        <i class="fab fa-google-plus"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#0077B5">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#000000">
                                                        <i class="fab fa-reddit-alien"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#00AFF0">
                                                        <i class="fab fa-skype"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="fs-xl" style="color:#0063DC">
                                                        <i class="fab fa-flickr"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center py-3">
                                                <h5 class="mb-0 fw-700">
                                                    764
                                                    <small class="text-muted mb-0">Connections</small>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center py-3">
                                                <h5 class="mb-0 fw-700">
                                                    1,673
                                                    <small class="text-muted mb-0">Followers</small>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn-link font-weight-bold">Follow</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                                                <a href="javascript:void(0);" class="btn-link font-weight-bold">Message</a> <span class="text-primary d-inline-block mx-3">&#9679;</span>
                                                <a href="javascript:void(0);" class="btn-link font-weight-bold">Connect</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- photos -->
                                <div class="card mb-g">
                                    <div class="row row-grid no-gutters">
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h2 class="mb-0 fs-xl">
                                                    Photos
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/1.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/2.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/3.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/4.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/5.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/6.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/7.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/8.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center px-3 py-4 d-flex position-relative height-10 border">
                                                <span class="position-absolute pos-top pos-left pos-right pos-bottom" style="background-image: url('<?="http://".ROOT_APP_URL."/img/demo/gallery/thumb/9.jpg";?>');background-size: cover;"></span>
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- contacts -->
                                <div class="card mb-g">
                                    <div class="row row-grid no-gutters">
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h2 class="mb-0 fs-xl">
                                                    Contacts
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-b.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Oliver Kopyov</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-c.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Sesha Gray</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-a.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Preny Amdaney</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-e.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Dr. John Cook PhD</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-h.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Sarah McBrook</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-i.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Jimmy Fellan</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-j.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Arica Grace</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-k.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Jim Ketty</span>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="javascript:void(0);" class="text-center p-3 d-flex flex-column hover-highlight">
                                                <span class="profile-image rounded-circle d-block m-auto" style="background-image:url('<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-g.png";?>'); background-size: cover;"></span>
                                                <span class="d-block text-truncate text-muted fs-xs mt-1">Ali Grey</span>
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                            </div>
<!-- SRODEK ŚRODEK -->
<!--PROFILE-->
							<div class="col-lg-12 col-xl-6 order-lg-3 order-xl-2 tab-content">

                                <?php

                                    include_once ("app/views/website_parts/diary.php");

                                ?>
					
<!-- EDYCJA --->
                    <div class="tab-pane fade <?=$profile_edit_active;?>" id="profile_edit" role="tab-panel">     
								<div id="panel" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Ustawienia konta <span class="fw-300"><i>username</i></span>
                                        </h2>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
										
											<?php Aplikacja\Messages::flashMessages(); ?>

                                            <form action="http://<?=ROOT_APP_URL;?>/changePassword" method="post">
												<fieldset disabled>
                                                <div class="form-group">
                                                    <label class="form-label" for="simpleinput">Username</label>
                                                    <input type="text" id="simpleinput" class="form-control" placeholder="Username">
                                                </div>
												</fieldset><br>
												<div class="form-group">
                                                    <label class="form-label" for="password">Old Password</label>
                                                    <input type="password" id="password" class="form-control" name="oldPassword">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="password">New Password</label>
                                                    <input type="password" id="password" class="form-control" name="password">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="example-password">Confirm New Password</label>
                                                    <input type="password" id="password" class="form-control" name="password2">
                                                </div>
												<div class="form-group">
														<button type="submit" class="btn btn-default float-right">Change Password</button>
													
												</div>
												<br><br>
											</form>
											
											<form>
                                                <div class="form-group">
                                                    <label class="form-label" for="example-email-2">Email</label>
                                                    <input type="email" id="example-email-2" name="email" class="form-control" placeholder="Email" value="">
                                                </div>											
                                                <div class="form-group">
                                                    <label class="form-label" for="example-textarea">Something about You</label>
                                                    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="example-select">Country</label>

<select name="country" class="form-control" id="country">
    <option value="0" label="Select a country ... " selected="selected">Select a country ... </option>
    <optgroup id="country-optgroup-Africa" label="Africa">
    <option value="DZ" label="Algeria">Algeria</option>
    <option value="AO" label="Angola">Angola</option>
    <option value="BJ" label="Benin">Benin</option>
    <option value="BW" label="Botswana">Botswana</option>
    <option value="BF" label="Burkina Faso">Burkina Faso</option>
    <option value="BI" label="Burundi">Burundi</option>
    <option value="CM" label="Cameroon">Cameroon</option>
    <option value="CV" label="Cape Verde">Cape Verde</option>
    <option value="CF" label="Central African Republic">Central African Republic</option>
    <option value="TD" label="Chad">Chad</option>
    <option value="KM" label="Comoros">Comoros</option>
    <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
    <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
    <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
    <option value="DJ" label="Djibouti">Djibouti</option>
    <option value="EG" label="Egypt">Egypt</option>
    <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
    <option value="ER" label="Eritrea">Eritrea</option>
    <option value="ET" label="Ethiopia">Ethiopia</option>
    <option value="GA" label="Gabon">Gabon</option>
    <option value="GM" label="Gambia">Gambia</option>
    <option value="GH" label="Ghana">Ghana</option>
    <option value="GN" label="Guinea">Guinea</option>
    <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
    <option value="KE" label="Kenya">Kenya</option>
    <option value="LS" label="Lesotho">Lesotho</option>
    <option value="LR" label="Liberia">Liberia</option>
    <option value="LY" label="Libya">Libya</option>
    <option value="MG" label="Madagascar">Madagascar</option>
    <option value="MW" label="Malawi">Malawi</option>
    <option value="ML" label="Mali">Mali</option>
    <option value="MR" label="Mauritania">Mauritania</option>
    <option value="MU" label="Mauritius">Mauritius</option>
    <option value="YT" label="Mayotte">Mayotte</option>
    <option value="MA" label="Morocco">Morocco</option>
    <option value="MZ" label="Mozambique">Mozambique</option>
    <option value="NA" label="Namibia">Namibia</option>
    <option value="NE" label="Niger">Niger</option>
    <option value="NG" label="Nigeria">Nigeria</option>
    <option value="RW" label="Rwanda">Rwanda</option>
    <option value="RE" label="Réunion">Réunion</option>
    <option value="SH" label="Saint Helena">Saint Helena</option>
    <option value="SN" label="Senegal">Senegal</option>
    <option value="SC" label="Seychelles">Seychelles</option>
    <option value="SL" label="Sierra Leone">Sierra Leone</option>
    <option value="SO" label="Somalia">Somalia</option>
    <option value="ZA" label="South Africa">South Africa</option>
    <option value="SD" label="Sudan">Sudan</option>
    <option value="SZ" label="Swaziland">Swaziland</option>
    <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
    <option value="TZ" label="Tanzania">Tanzania</option>
    <option value="TG" label="Togo">Togo</option>
    <option value="TN" label="Tunisia">Tunisia</option>
    <option value="UG" label="Uganda">Uganda</option>
    <option value="EH" label="Western Sahara">Western Sahara</option>
    <option value="ZM" label="Zambia">Zambia</option>
    <option value="ZW" label="Zimbabwe">Zimbabwe</option>
    </optgroup>
    <optgroup id="country-optgroup-Americas" label="Americas">
    <option value="AI" label="Anguilla">Anguilla</option>
    <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="AR" label="Argentina">Argentina</option>
    <option value="AW" label="Aruba">Aruba</option>
    <option value="BS" label="Bahamas">Bahamas</option>
    <option value="BB" label="Barbados">Barbados</option>
    <option value="BZ" label="Belize">Belize</option>
    <option value="BM" label="Bermuda">Bermuda</option>
    <option value="BO" label="Bolivia">Bolivia</option>
    <option value="BR" label="Brazil">Brazil</option>
    <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
    <option value="CA" label="Canada">Canada</option>
    <option value="KY" label="Cayman Islands">Cayman Islands</option>
    <option value="CL" label="Chile">Chile</option>
    <option value="CO" label="Colombia">Colombia</option>
    <option value="CR" label="Costa Rica">Costa Rica</option>
    <option value="CU" label="Cuba">Cuba</option>
    <option value="DM" label="Dominica">Dominica</option>
    <option value="DO" label="Dominican Republic">Dominican Republic</option>
    <option value="EC" label="Ecuador">Ecuador</option>
    <option value="SV" label="El Salvador">El Salvador</option>
    <option value="FK" label="Falkland Islands">Falkland Islands</option>
    <option value="GF" label="French Guiana">French Guiana</option>
    <option value="GL" label="Greenland">Greenland</option>
    <option value="GD" label="Grenada">Grenada</option>
    <option value="GP" label="Guadeloupe">Guadeloupe</option>
    <option value="GT" label="Guatemala">Guatemala</option>
    <option value="GY" label="Guyana">Guyana</option>
    <option value="HT" label="Haiti">Haiti</option>
    <option value="HN" label="Honduras">Honduras</option>
    <option value="JM" label="Jamaica">Jamaica</option>
    <option value="MQ" label="Martinique">Martinique</option>
    <option value="MX" label="Mexico">Mexico</option>
    <option value="MS" label="Montserrat">Montserrat</option>
    <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
    <option value="NI" label="Nicaragua">Nicaragua</option>
    <option value="PA" label="Panama">Panama</option>
    <option value="PY" label="Paraguay">Paraguay</option>
    <option value="PE" label="Peru">Peru</option>
    <option value="PR" label="Puerto Rico">Puerto Rico</option>
    <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
    <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="LC" label="Saint Lucia">Saint Lucia</option>
    <option value="MF" label="Saint Martin">Saint Martin</option>
    <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
    <option value="SR" label="Suriname">Suriname</option>
    <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
    <option value="US" label="United States">United States</option>
    <option value="UY" label="Uruguay">Uruguay</option>
    <option value="VE" label="Venezuela">Venezuela</option>
    </optgroup>
    <optgroup id="country-optgroup-Asia" label="Asia">
    <option value="AF" label="Afghanistan">Afghanistan</option>
    <option value="AM" label="Armenia">Armenia</option>
    <option value="AZ" label="Azerbaijan">Azerbaijan</option>
    <option value="BH" label="Bahrain">Bahrain</option>
    <option value="BD" label="Bangladesh">Bangladesh</option>
    <option value="BT" label="Bhutan">Bhutan</option>
    <option value="BN" label="Brunei">Brunei</option>
    <option value="KH" label="Cambodia">Cambodia</option>
    <option value="CN" label="China">China</option>
    <option value="CY" label="Cyprus">Cyprus</option>
    <option value="GE" label="Georgia">Georgia</option>
    <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
    <option value="IN" label="India">India</option>
    <option value="ID" label="Indonesia">Indonesia</option>
    <option value="IR" label="Iran">Iran</option>
    <option value="IQ" label="Iraq">Iraq</option>
    <option value="IL" label="Israel">Israel</option>
    <option value="JP" label="Japan">Japan</option>
    <option value="JO" label="Jordan">Jordan</option>
    <option value="KZ" label="Kazakhstan">Kazakhstan</option>
    <option value="KW" label="Kuwait">Kuwait</option>
    <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
    <option value="LA" label="Laos">Laos</option>
    <option value="LB" label="Lebanon">Lebanon</option>
    <option value="MO" label="Macau SAR China">Macau SAR China</option>
    <option value="MY" label="Malaysia">Malaysia</option>
    <option value="MV" label="Maldives">Maldives</option>
    <option value="MN" label="Mongolia">Mongolia</option>
    <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
    <option value="NP" label="Nepal">Nepal</option>
    <option value="NT" label="Neutral Zone">Neutral Zone</option>
    <option value="KP" label="North Korea">North Korea</option>
    <option value="OM" label="Oman">Oman</option>
    <option value="PK" label="Pakistan">Pakistan</option>
    <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
    <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
    <option value="PH" label="Philippines">Philippines</option>
    <option value="QA" label="Qatar">Qatar</option>
    <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
    <option value="SG" label="Singapore">Singapore</option>
    <option value="KR" label="South Korea">South Korea</option>
    <option value="LK" label="Sri Lanka">Sri Lanka</option>
    <option value="SY" label="Syria">Syria</option>
    <option value="TW" label="Taiwan">Taiwan</option>
    <option value="TJ" label="Tajikistan">Tajikistan</option>
    <option value="TH" label="Thailand">Thailand</option>
    <option value="TL" label="Timor-Leste">Timor-Leste</option>
    <option value="TR" label="Turkey">Turkey</option>
    <option value="TM" label="Turkmenistan">Turkmenistan</option>
    <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
    <option value="UZ" label="Uzbekistan">Uzbekistan</option>
    <option value="VN" label="Vietnam">Vietnam</option>
    <option value="YE" label="Yemen">Yemen</option>
    </optgroup>
    <optgroup id="country-optgroup-Europe" label="Europe">
    <option value="AL" label="Albania">Albania</option>
    <option value="AD" label="Andorra">Andorra</option>
    <option value="AT" label="Austria">Austria</option>
    <option value="BY" label="Belarus">Belarus</option>
    <option value="BE" label="Belgium">Belgium</option>
    <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="BG" label="Bulgaria">Bulgaria</option>
    <option value="HR" label="Croatia">Croatia</option>
    <option value="CY" label="Cyprus">Cyprus</option>
    <option value="CZ" label="Czech Republic">Czech Republic</option>
    <option value="DK" label="Denmark">Denmark</option>
    <option value="DD" label="East Germany">East Germany</option>
    <option value="EE" label="Estonia">Estonia</option>
    <option value="FO" label="Faroe Islands">Faroe Islands</option>
    <option value="FI" label="Finland">Finland</option>
    <option value="FR" label="France">France</option>
    <option value="DE" label="Germany">Germany</option>
    <option value="GI" label="Gibraltar">Gibraltar</option>
    <option value="GR" label="Greece">Greece</option>
    <option value="GG" label="Guernsey">Guernsey</option>
    <option value="HU" label="Hungary">Hungary</option>
    <option value="IS" label="Iceland">Iceland</option>
    <option value="IE" label="Ireland">Ireland</option>
    <option value="IM" label="Isle of Man">Isle of Man</option>
    <option value="IT" label="Italy">Italy</option>
    <option value="JE" label="Jersey">Jersey</option>
    <option value="LV" label="Latvia">Latvia</option>
    <option value="LI" label="Liechtenstein">Liechtenstein</option>
    <option value="LT" label="Lithuania">Lithuania</option>
    <option value="LU" label="Luxembourg">Luxembourg</option>
    <option value="MK" label="Macedonia">Macedonia</option>
    <option value="MT" label="Malta">Malta</option>
    <option value="FX" label="Metropolitan France">Metropolitan France</option>
    <option value="MD" label="Moldova">Moldova</option>
    <option value="MC" label="Monaco">Monaco</option>
    <option value="ME" label="Montenegro">Montenegro</option>
    <option value="NL" label="Netherlands">Netherlands</option>
    <option value="NO" label="Norway">Norway</option>
    <option value="PL" label="Poland">Poland</option>
    <option value="PT" label="Portugal">Portugal</option>
    <option value="RO" label="Romania">Romania</option>
    <option value="RU" label="Russia">Russia</option>
    <option value="SM" label="San Marino">San Marino</option>
    <option value="RS" label="Serbia">Serbia</option>
    <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
    <option value="SK" label="Slovakia">Slovakia</option>
    <option value="SI" label="Slovenia">Slovenia</option>
    <option value="ES" label="Spain">Spain</option>
    <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="SE" label="Sweden">Sweden</option>
    <option value="CH" label="Switzerland">Switzerland</option>
    <option value="UA" label="Ukraine">Ukraine</option>
    <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
    <option value="GB" label="United Kingdom">United Kingdom</option>
    <option value="VA" label="Vatican City">Vatican City</option>
    <option value="AX" label="Åland Islands">Åland Islands</option>
    </optgroup>
    <optgroup id="country-optgroup-Oceania" label="Oceania">
    <option value="AS" label="American Samoa">American Samoa</option>
    <option value="AQ" label="Antarctica">Antarctica</option>
    <option value="AU" label="Australia">Australia</option>
    <option value="BV" label="Bouvet Island">Bouvet Island</option>
    <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="CX" label="Christmas Island">Christmas Island</option>
    <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
    <option value="CK" label="Cook Islands">Cook Islands</option>
    <option value="FJ" label="Fiji">Fiji</option>
    <option value="PF" label="French Polynesia">French Polynesia</option>
    <option value="TF" label="French Southern Territories">French Southern Territories</option>
    <option value="GU" label="Guam">Guam</option>
    <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
    <option value="KI" label="Kiribati">Kiribati</option>
    <option value="MH" label="Marshall Islands">Marshall Islands</option>
    <option value="FM" label="Micronesia">Micronesia</option>
    <option value="NR" label="Nauru">Nauru</option>
    <option value="NC" label="New Caledonia">New Caledonia</option>
    <option value="NZ" label="New Zealand">New Zealand</option>
    <option value="NU" label="Niue">Niue</option>
    <option value="NF" label="Norfolk Island">Norfolk Island</option>
    <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="PW" label="Palau">Palau</option>
    <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
    <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
    <option value="WS" label="Samoa">Samoa</option>
    <option value="SB" label="Solomon Islands">Solomon Islands</option>
    <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
    <option value="TK" label="Tokelau">Tokelau</option>
    <option value="TO" label="Tonga">Tonga</option>
    <option value="TV" label="Tuvalu">Tuvalu</option>
    <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
    <option value="VU" label="Vanuatu">Vanuatu</option>
    <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
    </optgroup>
</select>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <label class="form-label">Upload Avatar</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="AvatarFile">
                                                        <label class="custom-file-label" for="AvatarFile">Choose file</label>
                                                    </div>
                                                </div>
												<div class="form-group">
													<br>
														<button type="submit" class="btn btn-default float-right">Change Credentials</button>
													<br><br>
												</div>
												
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
						</div>
								
								
                            <div class="col-lg-6 col-xl-3 order-lg-2 order-xl-2">
                                <!-- add : -->
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <a href="javascript:void(0);" class="d-flex flex-row align-items-center">
                                            <div class='icon-stack display-3 flex-shrink-0'>
                                                <i class="fal fa-circle icon-stack-3x opacity-100 color-primary-400"></i>
                                                <i class="fas fa-graduation-cap icon-stack-1x opacity-100 color-primary-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <strong>
                                                    Add Qualifications
                                                </strong>
                                                <br>
                                                Adding qualifications will help gain more clients
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="card mb-g">
                                    <div class="card-body">
                                        <a href="javascript:void(0);" class="d-flex flex-row align-items-center">
                                            <div class='icon-stack display-3 flex-shrink-0'>
                                                <i class="fal fa-circle icon-stack-3x opacity-100 color-warning-400"></i>
                                                <i class="fas fa-handshake icon-stack-1x opacity-100 color-warning-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <strong>
                                                    Add Skills
                                                </strong>
                                                <br>
                                                Gain more potential clients by adding skills
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- rating -->
                                <div class="card mb-g">
                                    <div class="row row-grid no-gutters">
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h2 class="mb-0 fs-xl">
                                                    Dr. Codex Lantern's Rating
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 d-flex text-primary align-items-center fs-xl">
                                                <i class="fas fa-star mr-1"></i>
                                                <i class="fas fa-star mr-1"></i>
                                                <i class="fas fa-star mr-1"></i>
                                                <i class="fas fa-star mr-1"></i>
                                                <i class="fal fa-star mr-1"></i>
                                                <span class="ml-auto">4/5 Stars</span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <div class="fw-500 fs-xs">Staff</div>
                                                <div class="progress progress-xs mt-2">
                                                    <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <div class="fw-500 fs-xs">Punctuality</div>
                                                <div class="progress progress-xs mt-2">
                                                    <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <div class="fw-500 fs-xs">Helpfulness</div>
                                                <div class="progress progress-xs mt-2">
                                                    <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <div class="fw-500 fs-xs">Knowledge</div>
                                                <div class="progress progress-xs mt-2">
                                                    <div class="progress-bar bg-primary-300 bg-primary-gradient" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <div class="fw-500 fs-xs">Bedside manners</div>
                                                <div class="progress progress-xs mt-2">
                                                    <div class="progress-bar bg-danger-300 bg-warning-gradient" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 text-center">
                                                <a href="javascript:void(0);" class="btn-link font-weight-bold">View all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- skills -->
                                <div class="card mb-g">
                                    <div class="row row-grid no-gutters">
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h2 class="mb-0 fs-xl">
                                                    Current Project
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h5 class="text-danger">
                                                    Xray improvement algorythm
                                                    <small class="mt-0 mb-3 text-muted">
                                                        Migration of new API to local servers
                                                    </small>
                                                    <span class="badge badge-danger fw-n position-absolute pos-top pos-right mt-3 mr-3">Delayed</span>
                                                </h5>
                                                <div class="row fs-b fw-300">
                                                    <div class="col text-left">
                                                        Progress
                                                    </div>
                                                    <div class="col text-right">
                                                        26%
                                                    </div>
                                                </div>
                                                <div class="progress progress-xs d-flex mb-2 mt-1">
                                                    <span class="progress-bar bg-danger-500 progress-bar-striped" role="progressbar" style="width: 26%" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></span>
                                                </div>
                                                <div class="fw-300 mb-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            Budget
                                                        </div>
                                                        <div class="col text-right text-danger">
                                                            -$155,473.70
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3">
                                                <h5>
                                                    Radioactive Isotope Research
                                                    <small class="mt-0 mb-3 text-muted">
                                                        Accelerator based methods of Technetium99m production – target preparation and processing and beam monitoring technologies
                                                    </small>
                                                    <span class="badge badge-primary fw-n position-absolute pos-top pos-right mt-3 mr-3">A</span>
                                                </h5>
                                                <div class="row fs-b fw-300">
                                                    <div class="col text-left">
                                                        Progress
                                                    </div>
                                                    <div class="col text-right">
                                                        90%
                                                    </div>
                                                </div>
                                                <div class="progress progress-xs d-flex mb-2 mt-1">
                                                    <span class="progress-bar bg-primary-500 progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></span>
                                                </div>
                                                <div class="fw-300 mb-0">
                                                    <div class="row">
                                                        <div class="col">
                                                            Budget
                                                        </div>
                                                        <div class="col text-right">
                                                            $1,325,987.30
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 text-center">
                                                <div class="text-left fw-400 ">
                                                    <div class="text-secondary mb-1">Project Owners</div>
                                                    <div class="fs-sm d-flex align-items-center">
                                                        <a href="#" class="btn-m-s">
                                                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-a.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                        </a>
                                                        <a href="#" class="btn-m-s">
                                                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-b.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                        </a>
                                                        <a href="#" class="btn-m-s">
                                                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-c.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                        </a>
                                                        <a href="#" class="btn-m-s">
                                                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-e.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                        </a>
                                                        <a href="#" class="btn-m-s">
                                                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-h.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                        </a>
                                                        <a href="#" class="btn-m-s">
                                                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-k.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                        </a>
                                                        <a href="#" class="btn-m-s fs-xs">
                                                            <span data-hasmore="+7" class="rounded-circle profile-image-sm">
                                                                <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-j.png";?>" class="profile-image-sm rounded-circle" alt="aa">
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content --><?php

app\Page::lowerContent();

?>