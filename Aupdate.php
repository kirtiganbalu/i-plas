<?php
// Include config file

require_once "config.php";
date_default_timezone_set("Asia/Kuala_Lumpur");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>i-Plas Daily Record</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="js/jquery-3.5.1.js"></script> 
        <script>
        $(function() {
        $(".toggle").on("click", function() {
            if ($(".item").hasClass("active")) {
                $(".item").removeClass("active");
            } else {
                $(".item").addClass("active");
            }
        });
    });
        </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('header.php'); ?>

    <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     

      <li class="nav-heading">Pages</li>
      <li class="nav-item">
	     <a class="nav-link collapsed" href="Arecord.php">
           <i class="bi bi-justify"></i>
           <span>Record</span>
         </a>
	  <!-- End Record Nav -->
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Statistics</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Adaily.php">
              <i class="bi bi-circle"></i><span>Daily</span>
            </a>
          </li>
          <li>
            <a href="Aweekly.php">
              <i class="bi bi-circle"></i><span>Weekly</span>
            </a>
          </li>
		  <li>
            <a href="Amonthly.php">
              <i class="bi bi-circle"></i><span>Monthly</span>
            </a>
          </li>
        </ul>
		 </li><!-- End Tables Nav -->
    
	   <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
	   <i class="bi bi-gear-fill"></i><span>Setup</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Aupdate.php">
              <i class="bi bi-circle"></i><span>Update</span>
            </a>
			</li>
        </ul>
		
		  </li><!-- End Tables Nav -->
		  
      <li class="nav-item">
        <a class="nav-link collapsed" href="Areport.php">
          <i class="bi bi-card-text"></i>
		  
          <span>Report</span>
        </a>
      </li><!-- End Login Page Nav -->
	  
      <li class="nav-item">
        <a class="nav-link collapsed" href="Aupdate.php">
          <i class="bi bi-box-arrow-in-left"></i>
		  
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  
  <section class="section">
      <div class="row">
        <div class="col-lg-12">

				
		   </div>
      </div>
    </section>

    <title>Update Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>			
			<body>
				<form  class='container'>
				<h1>UPDATE STUDENT'S DATA</h1>

				<div class='container1'>
				<div class="btn">
				<button type="button" class="btn btn-primary mt-3 btnupdatedatapelajar"><i class="fa fa-retweet"></i> Klik / Tap Untuk Kemaskini</button>
		</div>
		<div class="updatestudentcontentsect mt3"></div>

		<script>
			$(".btnupdatedatapelajar").click(function(){
			$(".updatestudentcontentsect").prepend('<i class="fa fa-cog fa-spin"></i> Mengemaskini. May take a while...');
			$(".updatestudentcontentsect").load('getdata.php');
		});	
		</script>
		</div> 
				</form>
				
				
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
     <p> <center>Designed By PSMZA Student SESI II 2023/2024 </center> </p>
	 
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
 
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>