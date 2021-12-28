<?php 
$con=mysqli_connect("localhost","root","","pso_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
$query = mysqli_query($con,"SELECT * FROM symptoms_tbl");
$symptoms = mysqli_fetch_all($query, MYSQLI_ASSOC);



function dieses_symp($con,$d_id){
	$query = mysqli_query($con,"SELECT * FROM disease_symp_tbl INNER JOIN symptoms_tbl ON 
					       symptoms_tbl.symp_id = disease_symp_tbl.s_id WHERE disease_symp_tbl.d_id = '$d_id' ");
	$dieses_symp_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
	return $dieses_symp_data;
}



function hospital($con, $d_title){
		$query = mysqli_query($con,"SELECT * FROM dieses_tbl INNER JOIN disease_hospital_tbl ON 
					       disease_hospital_tbl.d_id = dieses_tbl.dieses_id INNER JOIN hospital_tbl ON
					       hospital_tbl.hospital_id = disease_hospital_tbl.h_id
					       WHERE dieses_tbl.dieses_title = '$d_title' ");
		$hospital_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
		return $hospital_data;
}



if(isset($_POST['healthIssue']) && count($_POST['healthIssue']) > 2){
	
	$particles = $_POST['healthIssue'];
	$diesesCheck = array();
	$maySuffer = array();

	// defining Solution Space
	$query = mysqli_query($con,"SELECT * FROM dieses_tbl");
	$dieses = mysqli_fetch_all($query, MYSQLI_ASSOC);
	$w=0;
	$r1 = rand(0,1);
	$r2 = rand(0,1);
	$c1 = 2;
	$c2 = $c1;
	$vi = 0;
	foreach ($dieses as $key => $gBest) {
		$w=0;
		// initializing Particles
		 $fitnessValue = dieses_symp($con,$gBest['dieses_id']);
		

			
			// calculating fitness value
				//$fitnessValue = $this->Health_m->symptoms($symp);

				if($fitnessValue){
					$cp = count($fitnessValue);
					
						
						foreach($fitnessValue as $pBest){

							foreach ($particles as $key => $symp) {
							if($gBest['dieses_id'] == $pBest['d_id']){
								if($pBest['symp_title'] == $symp){

									// echo "accessed";

									$w = $w + $pBest['weight'];
									$vi = $vi + 1;
									$vi = $w*$vi+$c1*$r1*(count($pBest) - $cp)+$c2*$r2*(count($gBest) - $cp);
									$cp = $cp + $vi;
										if($w >= 5){
											if(!in_array($gBest['dieses_title'], $diesesCheck)){
												$diesesCheck[] = $gBest['dieses_title'];
												if(in_array($gBest['dieses_title'], $maySuffer)){
													$index = array_search($gBest['dieses_title'], $maySuffer);
													unset($maySuffer[$index]);
												}
											}	
										}else{
											if($w < 5 && $w >= 1){
												if(!in_array($gBest['dieses_title'], $maySuffer) ){
												$maySuffer[] = $gBest['dieses_title'];
												}
											}	
										}

								}
							}
						}
					}
				}
	}

	if($maySuffer){
	}

	if($diesesCheck){
	}

}else{
	header("location:find.php?error=3");
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
    <div class="col-sm-6">
      <div class="panel panel-danger">
        <div class="panel-heading"><h3 class="text-center">Disease Detection</h3></div>
        <div class="panel-body">
          <?php if(isset($diesesCheck) && !empty($diesesCheck)): ?>
            <p><h3>You are suffering from <strong><?= $diesesCheck[0] ?></strong></h3></p>
            <br>
          

          	<div class="recomended-box">
            <p class="box-heading">Recomended Hospital:</p>
            <ul>
				<?php $h_detail = hospital($con,$diesesCheck[0]); ?>



                <?php foreach($h_detail as $value): ?>
                  <li><i class=""></i><?= $value['hospital_title'] ?></li>
                  <li><i class="fa fa-map-marker"></i><?= $value['hospital_address'] ?></li>
                  <li><i class="fa fa-phone"></i><?= $value['hospital_contact'] ?></li>
                  <li><i class="fa fa-link"></i><a href="<?= $value['hospital_link'] ?>"><?= $value['hospital_link'] ?></a></li>
                  <li><i class="fa fa-globe"></i><a href="<?= $value['hospital_location'] ?>">Google Map</a></li>
                <?php endforeach;?>
              <?php endif; ?>
              
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-warning">
        <div class="panel-heading"><h3 class="text-center">Suggestions</h3></div>
        <div class="panel-body">
          <?php if(isset($maySuffer) && !empty($maySuffer)): ?>
            <p><h3>You may suffer from <strong><?= $maySuffer[0] ?></strong></h3></p>
            <p><strong>Note: You Need Medical Checkup</strong></p>

			<?php $h_detail2 = hospital($con,$maySuffer[0]); ?>
          
          <div class="recomended-box">
            <p class="box-heading">Recomended Hospital:</p>
            <ul>
                <?php foreach($h_detail2 as $value): ?>
                  <li><i class=""></i><?= $value['hospital_title'] ?></li>
                  <li><i class="fa fa-map-marker"></i><?= $value['hospital_address'] ?></li>
                  <li><i class="fa fa-phone"></i><?= $value['hospital_contact'] ?></li>
                  <li><i class="fa fa-link"></i><a href="<?= $value['hospital_link'] ?>"><?= $value['hospital_link'] ?></a></li>
                  <li><i class="fa fa-globe"></i><a href="<?= $value['hospital_location'] ?>">Google Map</a></li>
                <?php endforeach;?>
              <?php endif; ?>
            </ul>
          </div>


        </div>
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
