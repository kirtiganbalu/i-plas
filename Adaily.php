<?php
// Include config file
require_once "config.php";
 
?>

<!-- ... (rest of your HTML code) ... -->


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
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="Arecord.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">i-PLAS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


          <!--menu-->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

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
        <a class="nav-link collapsed" href="login.php">
          <i class="bi bi-box-arrow-in-left"></i>
		  
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Attandance Records</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Daily</li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

<body>

    <div class="pagetitle">
      <h1>Daily Record</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                 <thead>
					<tr>
						<th>Id</th>
						<th>Ic</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Department</th>
						<th>Total Attendance</th>
						<th>Date</th>
						<th>Category</th>
						
					</tr>
				</thead>
				<tbody>
				 <?php
					$sql = "SELECT  
						student_attendance.id_student_attendance as id,
						student_attendance.created_date as created_date,
						stud_rec.ic as ic,
						stud_rec.name as name,
						stud_rec.gender as gender,
						stud_rec.department as department,
						count(*) as count,
						stud_rec.category as category
						FROM 
					student_attendance 
					JOIN stud_rec ON student_attendance.id_stud_rec=stud_rec.id 
					group by student_attendance.id_stud_rec, student_attendance.created_date   
					";
					//echo $sql;
					$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					$a=1;
					while($row = $result->fetch_assoc()) {
				 
					?>
					<tr>
						<td> <?php echo $a++;?>. </td>
						<td><?php echo $row['ic'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['department'];?></td>
						<td><?php echo $row['count'];?></td>
						<td><?php echo $row['created_date'];?></td>
						<td><?php echo $row['category'];?></td>
						
					</tr>
						<?php
				 }
				 ?>
				</tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  </main><!-- End #main -->

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