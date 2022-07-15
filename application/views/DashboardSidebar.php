<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href=<?php echo base_url('dashboard')?>>
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                        <!-- <nav class="sb-sidenav-menu-nested nav"> -->
                        <!-- <a class="nav-link" href="javascript:colorchange()">Theme</a> -->

                        <!-- <div>
                            <div class="sb-sidenav-menu-heading">Tables</div>
                                <a class="nav-link" href=<?php echo base_url('adminSignupView')?>>
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Admin Signup
                                </a>
                                <a class="nav-link" href=<?php echo base_url('userSignupView')?>>
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    User Signup
                                </a>
                        </div> -->
                        <!-- </nav> -->
                        <div class="sb-sidenav-menu-heading">Tables</div>
                            <a class="nav-link" href=<?php echo base_url('adminRegistration')?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Admins
                            </a>
                            <a class="nav-link" href=<?php echo base_url('userRegistration')?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href=<?php echo base_url('bookingInfo')?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Booking Info
                            </a>
                            <a class="nav-link" href=<?php echo base_url('pendingEntries')?>>
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pending Entries
                            </a>
                            <div class="sb-sidenav-menu-heading">Account</div>
                            <!-- <nav class="sb-sidenav-menu-nested nav"> -->
                            <a class="nav-link" href=<?php echo base_url('Alogout')?>>LogOut</a>
                        </div>
                    </div>
            </nav>
        </div>
