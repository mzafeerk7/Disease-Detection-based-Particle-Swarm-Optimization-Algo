<?php
ini_set('max_execution_time', 5000);
require('vendor/autoload.php'); 
use Goutte\Client;
$client = new Client();
?>
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
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="#">Services <span class="caret"></span></a>
                                            <ul class="sub-menu text-left">
                                                <li><a href="#">Find Drugs</a></li>
                                                <li><a href="#">Find Disease</a></li>
                                                <li><a href="#">Find Hospitals</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="find-disease.html">Find Disease</a></li>
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
        
        <section class="search-main-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <?php
        if(isset($_GET["medicine"])){
            //here crawling starts
            $crawler_sub = $client->request('GET',"https://www.webmd.com/drugs/2/search?type=drugs&query=".$_GET["medicine"]);
            $crawler_sub->filter('.drugs-results ul li a')->each(function ($link){
                global $client;
                global $con;
                
                $medicine_name = $link->text();
                $med_link = $link->attr("href");
                $crawler_n = $client->request('GET',$med_link);
                $uses = '';
                $side_effects = '';
                $precautions = '';
                try {
                    global $uses;
                    global $side_effects;
                    global $precautions;
                    $uses = (!empty($crawler_n->filter('div[id="tab-1"] div div p')->text()))?$crawler_n->filter('div[id="tab-1"] div div p')->text():'';
                    $side_effects = (!empty($crawler_n->filter('div[id="tab-2"] div div p')->text()))?$crawler_n->filter('div[id="tab-2"] div div p')->text():'';
                    $precautions = (!empty($crawler_n->filter('div[id="tab-3"] div div p')->text()))?$crawler_n->filter('div[id="tab-3"] div div p')->text():'';
                } catch(Exception $e){
                    $uses = '';
                    $side_effects = '';
                    $precautions = '';
                }
                //for echo
                ?>

                        <div class="search-area">
                            <div class="search-details">
                                <h5><a href="#"><?=$medicine_name?></a></h5>
                                <h6><b>Uses:</b> <?=$uses?></h6>
                                <h6><b>Side Effects:</b> <?=$side_effects?></h6>
                                <h6><b>Precautions:</b> <?=$precautions?></h6>
                                <!--<a href="#" class="medisearcher-btn">read more</a>-->
                            </div>
                        </div>
                <?php
            });
        }
        /*
        */
     ?>
                    </div>
                </div>    
            </div>
        </section><!--End search-main-area area -->
        
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
        </footer><!--End footer area -->
        <!-- jequery-->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Bootstrap min.js  -->
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/bootstrap/js/popper.min.js"></script>
        <!-- slick slider js  -->
        <script src="assets/js/slick.min.js"></script>
        <!-- isotope min.js  -->
        <script src="assets/js/isotope.min.js"></script>
        <!-- imageloaded js-->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <!--meanmenu js -->
        <script src="assets/js/jquery.meanmenu.js"></script>
        <!-- magnific-popup js  -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <!--main js-->
        <script src="assets/js/main.js"></script>
    </body>
</html>    