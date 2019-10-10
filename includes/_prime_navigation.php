<!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                          <img src="<?="http://".ROOT_APP_URL."/img/logo.png";?>" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1"><?=SITE_NAME;?></span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">  
                            <img src="<?="http://".ROOT_APP_URL."/img/demo/avatars/avatar-admin.png";?>" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
                            <div class="info-card-text">
                                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        <?=$_SESSION['user']->username;?>
                                    </span>
                                </a>
                                <span class="d-inline-block text-truncate text-truncate-sm">jakas informacja</span>
                            </div>
                            <img src="<?="http://".ROOT_APP_URL."/img/card-backgrounds/cover-2-lg.png";?>" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
						<!-- lista podstron aplikacji -->
						
						
						<ul id="js-nav-menu" class="nav-menu">
							<li <?php if($ActiveMenuCategory=="MAIN"){ echo "class=\"active\""; }?>>
								<a href="#" title="Application Intel" data-filter-tags="application intel">
									<i class="fal fa-info-circle"></i>
                                	<span class="nav-link-text">Main</span>
								</a>
                                <ul>
									<li<?php if($ActiveMenuSubCategory=="forum"){ echo " class=\"active\""; }?>>
                                		<a href="http://<?=ROOT_APP_URL;?>/forum" title="Forum" >
                                    	<span class="nav-link-text">Forum</span>
                              			</a>
									</li>
                                    <li <?php if($ActiveMenuSubCategory=="dashboard"){ echo "class=\"active\""; }?>>
                                        <a href="http://<?=ROOT_APP_URL;?>" title="Analytics Dashboard" data-filter-tags="application intel analytics dashboard">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Analytics Dashboard</span>
                                        </a>
                                    </li>
                                    <li <?php if($ActiveMenuSubCategory=="profile"){ echo "class=\"active\""; }?>>
                                        <a href="http://<?=ROOT_APP_URL;?>/profile" title="Marketing Dashboard" data-filter-tags="application intel marketing dashboard">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_marketing_dashboard">Profile</span>
                                        </a>
                                    </li>
                                    <li <?php if($ActiveMenuSubCategory=="Inbox"){ echo "class=\"active\""; }?>>
                                        <a href="http://<?=ROOT_APP_URL;?>/inbox" title="Introduction" data-filter-tags="application intel introduction">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_introduction">Inbox</span>
                                        </a>
                                    </li>
                                </ul>
							</li>
							<?php
							if($_SESSION['user']->isAdmin()){
								
								echo'<li';
									if($ActiveMenuCategory=="PANEL"){echo " class=\"active open\"";}
								echo '>
								<a href="#" title="Panel Admina" data-filter-tags="Admin Panel">
                                	<i class="fal fa-info-circle"></i>
                                	<span class="nav-link-text">Panel Admina</span>
								</a>
								<ul>
                                    <li';
									if($ActiveMenuSubCategory=="UserList"){echo " class=\"active\"";}
								echo '>
                                        <a href="http://'.ROOT_APP_URL.'/AdminPanel" title="Lista Userów" data-filter-tags="lista userów">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Lista Userów</span>
                                        </a>
                                    </li>
                                    <li';
									if($ActiveMenuSubCategory=="Settings"){ echo " class=\"active\"";}
								echo '>
                                        <a href="http://'.ROOT_APP_URL.'/AdminPanel" title="Analytics Dashboard" data-filter-tags="application intel analytics dashboard">
                                            <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Site Settings</span>
                                        </a>
                                    </li>
									<li>
                               			<a href="http://'.ROOT_APP_URL.'/phpmyadmin" title="Application Intel" target="_blank">
                                    	<span class="nav-link-text">phpMyAdmin</span>
                                		</a>
									</li>
									<li>
                               			<a href="html_info/intel_analytics_dashboard.html" title="Application Intel" target="_blank">
                                    	<span class="nav-link-text">Baza danych tego gówna</span>
                                		</a>
									</li>
                                </ul>
							</li>	
							';	}
							?>
						</ul>
									
			
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
					<a href="#" class="btn color-primary-50" data-action="toggle" data-class="layout-composed">Try with Composed Layout</a>
                <?php
					//require_once("_nav_footer.php");
				?>
					<!-- END NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
