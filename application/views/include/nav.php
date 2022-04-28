
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label"><?php echo get_langdata($this->session->userdata('lang'), 'navtitle'); ?></li>
                    <li><a href="/index.php/home" aria-expanded="false"> <i class="mdi mdi-speedometer"></i><span class="nav-text"><?php echo get_langdata($this->session->userdata('lang'), 'dashboard'); ?></span> </a></li>                    
                    <li><a href="/index.php/user" aria-expanded="false"><i class="mdi mdi-layers"></i><span class="nav-text"><?php echo get_langdata($this->session->userdata('lang'), 'usrmanagement'); ?></span></a></li>
                    <li><a href="/index.php/system" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="nav-text"><?php echo get_langdata($this->session->userdata('lang'), 'sysconfiguration'); ?></span></a></li>
                    <li><a href="/index.php/transaction" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="nav-text"><?php echo get_langdata($this->session->userdata('lang'), 'trsctnhistory'); ?></span></a></li>                   
                    <li><a href="/index.php/deposit" aria-expanded="false"><i class="mdi mdi-bootstrap"></i><span class="nav-text"><?php echo get_langdata($this->session->userdata('lang'), 'dpsthistory'); ?></span></a></li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
