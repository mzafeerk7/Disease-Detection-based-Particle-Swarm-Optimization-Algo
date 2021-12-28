<!doctype html>
<html>
    <head>
        <!--All Meta -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- page title -->
        <title>Medi Searcher</title>
        <!--Bootstrap css-->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- Fontawesome css -->
        <link rel="stylesheet" href="assets/css/all.min.css">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <!--main style css-->
        <link rel="stylesheet" href="assets/css/main.css">
        <!--Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!--modernizr js-->
        <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    </head>
    <body>
        <!--Start Preloader Area-->
        <div class="preloader-area">
            <div class="spinner">
                <div class="hearbeat infinite animated pulse">
                    <i class="fas fa-heartbeat"></i>
                </div>
            </div>
        </div><!--End Preloader Area -->
        <!--Start Header area-->
        <header id="header-area">
            <div class="main-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="logo">
                                <a href="index.html">MediSearcher</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="main-menu">
                                <nav>
                                    <ul>                                                         
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="#">Services <span class="caret"></span></a>
                                            <ul class="sub-menu text-left">
                                                <li><a href="#">Find Drugs</a></li>
                                                <li><a href="find.php">Find Disease</a></li>
                                                <li><a href="#">Find Hospitals</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="find.php">Find Disease</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-12"><div class="mobile-menu"></div></div>
                    </div>
                </div>
            </div>
        </header><!--End header area -->
        <!--Start banner-area -->
        <section class="banner-area">
            <div class="slider-overlay"></div>
            <div class="container-full">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-area text-center">
                            <div class="hero-text">
                                <span>welcome to medisearcher</span>
                                <h1>we care about your health</h1>
                                <p>Medi Searcher provide different facilities to the patients.</p>
                            </div>
                            <div class="col-6 offset-3 text-center">
                                <form action="search.php" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Medicines" name="medicine">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button> 
                                  </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--End banner-area -->
        <!--Start service-top-->
        <section class="service-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="t-service-1">
                            <div class="t-service-icon">
                                <i class="fas fa-syringe"></i>
                            </div>
                            <div class="t-service-details">
                                <h4>Search Medicines</h4>
                                <p>we are providing the user medicines details
                                according to user entery.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="t-service-2">
                            <div class="t-service-icon">
                                <i class="fas fa-wheelchair"></i>
                            </div>
                            <div class="t-service-details">
                                <h4>Diagonsed Disease</h4>
                                <p>We are providing user disease details regarding 
                                their symptoms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="t-service-3">
                            <div class="t-service-icon">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <div class="t-service-details">
                                <h4>Hosiptals Recommendation</h4>
                                <p>We also recommend Hosiptal regarding 
                                their diseases.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--End service-top-->
        
        <!--start footer area -->
        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-text text-center">
                            <p>&copy; Copyright 2018 All rights reserved by Medi Searcher</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jquery-->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Bootstrap min.js  -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/bootstrap/js/popper.min.js"></script>
        <!--meanmenu js -->
        <script src="assets/js/jquery.meanmenu.js"></script>
        <!-- magnific-popup js  -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <!--main js-->
        <script src="assets/js/main.js"></script>
    </body>
</html>    