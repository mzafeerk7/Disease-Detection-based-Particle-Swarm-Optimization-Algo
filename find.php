<?php 
$con=mysqli_connect("localhost","root","","pso_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>


 <!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Health</title>

   <link rel="stylesheet" type="text/css" href="assets2/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets2/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="assets2/css/custom.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  

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

<body id="page-top">
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


<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="text-center">Symptoms</h3></div>
        <div class="panel-body">
          <div class="check-list">
          <h4>Select the symptoms from the following list</h4>
          <?php if(isset($_GET['error']) && $_GET['error'] == 3): ?>
            <p class="text-danger">Select Min 3 Symptoms</p>
          <?php endif; ?>
          <form action="get_result.php" method="post">
          	<?php 
          		$query = mysqli_query($con,"SELECT * FROM symptoms_tbl");
				      $symptoms = mysqli_fetch_all($query, MYSQLI_ASSOC);
          	?>
            <?php if(isset($symptoms)): ?>
              <?php foreach($symptoms as $value): ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="healthIssue[]" value="<?= $value['symp_title'] ?>"><?= $value['symp_description'].' '.$value['symp_title']. '?' ?>
                  </label>
                </div>
              <?php endforeach;?>
            <?php endif; ?>
           </div> 
        </div>
        <div class="panel-footer text-center">
          <button type="submit" class="btn btn-primary btn-block btn-large" name="find_btn">SEARCH</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>






<script src="assets2/js/jquery_v3.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets2/js/bootstrap.min.js"></script>
<!-- custom js -->
<script src="assets2/js/custom.js"></script>



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
