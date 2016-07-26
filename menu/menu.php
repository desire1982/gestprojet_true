
 <!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           <?php 
		   session_start();
		   include('/menu/menu_horizontal.php');
		   echo $_SESSION['role'];
		   $role = $_SESSION['role'];
		   
		     ?>
               
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        <?php if($role == 'admin' || $role == '2' ) { ?>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> PROJET</a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="destination_details.php">                      
                                    DESTINATION</a>
                                </li>
                                <li>
                                    <a href="source_financeprojet.php">FINANCEMENT</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> BUDGET</a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="dotation_projets.php">DOTATION</a>
                                </li>
                                <li>
                                    <a href="modif_budget.php">MODIFICATION BUDGETAIRE</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> DETAILS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="detailsdotation_projets.php">Details dotation</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <?php } ?>  
         
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Suivi projet de marche<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Origine</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Structure</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Dossier de marche</a>
         
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="dossier_projets_m.php">enregistrer</a>
                                        </li>
                                        <li>
                                            <a href="#">visualiser</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                         
                                <li>
                                    <a href="niveau_exe_dossier_projet.php">Niveau d'execution</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level </span></a>
                                    
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

