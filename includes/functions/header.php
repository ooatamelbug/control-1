<!DOCTYPE html>
                        <html class="no-js">
                            
                            <head>
                            <title>Admin Home Page</title>
                            <!-- Bootstrap -->
                            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
                            <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
                            <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
                            <link href="assets/styles.css" rel="stylesheet" media="screen">
                            <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
                            <!--[if lt IE 9]>
                                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                            <![endif]-->
                            <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
                        </head>
                        
                        <body>
                            <div class="navbar navbar-fixed-top">
                                <div class="navbar-inner">
                                    <div class="container-fluid">
                                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        </a>
                                        <a class="brand" href="#">Admin Panel</a>
                                        <div class="nav-collapse collapse">
                                            <ul class="nav pull-right">
                                                <li class="dropdown">
                                                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?=$_SESSION['IDn']?>  <i class="caret"></i>
                    
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a tabindex="-1" href="edit.php">Logout</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="nav">
                                                <li class="active">
                                                    <a href="search.php">Dashboard</a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <!--/.nav-collapse -->
                                    </div>
                                </div>
                            </div>