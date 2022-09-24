</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary text-white bg-darkgray disabled elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>dashboard" class="brand-link bg-darkgray text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.7rem;height: 1.7rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                   
                   
                   <?php if($_settings->userdata('type') == 3 or $_settings->userdata('type') == 1 ): ?> 
                   <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-play"></i>
                        <p>
                          Play
                        </p>
                      </a>
                    </li>
 
                    <?php endif; ?>
                    <?php if($_settings->userdata('type') == 3): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/rules" class="nav-link nav-maintenance_rules">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Rules
                        </p>
                      </a>
                    </li>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/hist_bets" class="nav-link nav-maintenance_hist_bets">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Betting History
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>
                    

                    <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance" class="nav-link nav-maintenance">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li>

                     <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/hist_cashin" class="nav-link nav-maintenance_hist_bets">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Cash-in Logs
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/hist_cashout" class="nav-link nav-maintenance_hist_bets">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Cash-out Logs
                        </p>
                      </a>
                    </li>
                    
		<?php if($_settings->userdata('type') == 1): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/admin_hist_bets" class="nav-link nav-maintenance_rules">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Fight Logs
                        </p>
                      </a>
                    </li>
	        <?php endif; ?>

                    <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?> 

                    <li class="nav-item dropdown">
                    Cash In & Out Process
                    </li>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/cashin" class="nav-link nav-maintenance_cashin">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                          Cash-In
                        </p>
                      </a>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/cashout" class="nav-link nav-maintenance_cashout">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                          Cash-out
                        </p>
                      </a>

                    </li>

                  

                    <li class="nav-item dropdown">
                    Commissions
                    </li>

                   <?php if($_settings->userdata('type') == 2): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/comsfight_logs" class="nav-link nav-maintenance_hist_bets">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Commission Fight Logs
                        </p>
                      </a>
                    </li>
		   <?php endif; ?>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/commission" class="nav-link nav-maintenance_commission">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                          Commission Earn
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>

                    <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/hist_commission" class="nav-link nav-maintenance_hist_commission">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                          Commission Withdraw
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>


                    <?php endif; ?>


                    <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?> 
                    <li class="nav-item dropdown">
                    Sub-Agents/Players
                    </li> 

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=user/list" class="nav-link nav-user_list">
                        <i class="nav-icon fas fa-users"></i>
                        <?php if($_settings->userdata('type') == 1): ?> 
                        <p>
                          Agents/Players
                        </p>
                        <?php else: ?>
                        <p>
                          My Agents
                        </p>
                        <?php endif; ?>
                      </a>
                    </li>
                    <?php endif; ?>

                    <?php if($_settings->userdata('type') == 2): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=user/list_players" class="nav-link nav-user_list_players">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          My Players
                        </p>
                      </a>
                    </li>

                    <?php endif; ?>

                    <?php if($_settings->userdata('type') == 2): ?> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=user/list_players_approval" class="nav-link nav-user_list_players_approval">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          For Approval Players
                        </p>
                      </a>
                    </li>

                    <?php endif; ?>



                    <?php if($_settings->userdata('type') == 1): ?> 
                    <li class="nav-item dropdown">
                    Systems Settings
                    </li>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/events" class="nav-link nav-maintenance_events">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                          Arena
                        </p>
                      </a>
                    </li>

                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=maintenance/template" class="nav-link nav-maintenance_template">
                        <i class="nav-icon fas fa-video"></i>
                        <p>
                          Video Link
                        </p>
                      </a>
                    </li>
            
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>dashboard/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Settings
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>




                    
                    <li class="nav-item dropdown">
                    My Account
                    </li>

                    <li class="nav-item dropdown">
                    	<a class="btn-group nav-link" href="<?php echo base_url.'dashboard/?page=user' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                          My Account
                        </p>
                      </a>
                    </li>

                    <li class="nav-item dropdown">
                    	<a class="btn-group nav-link" href="<?php echo base_url.'/classes/Login.php?f=logout' ?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                          Logout
                        </p>
                      </a>
                    </li>
            
   






                    
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.split('/');
      page = page.join('_');

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
     
    })


  </script>