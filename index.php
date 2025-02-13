<?php
session_start();

require('config.php');
//print $_SESSION ['username'];

/*if(!isset($_SESSION['username']))
{
	header('Location:index.php');
}
*/

function count_user($conn, $category){
		 
		$sql = "SELECT count(*) as count from stud_rec WHERE category='$category' ";
		
		  
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		
		
		
		$bil=1;
		while($row = $result->fetch_assoc()) {
		  return $row['count'];
		}
}
	
?>
	
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">i-PLAS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

         <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> 
            <i class="bi bi-house"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow home">
            <li class="dropdown-header">
             
            </li>

          
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
	  
	  <li class="nav-item">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Student</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-group-fill "></i>
                    </div>
				
                    <div class="ps-3">
                      <h6><?php echo count_user($conn, 'STUDENT'); ?> </h6>
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Staff </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-group-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo count_user($conn, 'staff'); ?></h6>
                      

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


     
              <section class="section">
      <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Student</h5>

              <!-- Line Chart -->
              <canvas id="Student" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#Student'), {
                    type: 'line',
                    data: {
                      labels: [	
					  <?php
						$sql = "SELECT MONTHNAME(created_date) as bulan, count(*) FROM student_attendance group by MONTH(created_date)";
						//echo $sql;
						$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						$a=1;
						while($row = $result->fetch_assoc()) {
					  ?>					  
					  '<?php echo $row['bulan']; ?>', 
					  <?php

						}
		
		
					   ?>
					  ],
                      datasets: [{
                        label: 'Student',
                        data: [
						<?php
						$sql2 = "SELECT MONTH(created_date) as bulan, count(*) as count FROM student_attendance INNER JOIN stud_rec WHERE category = 'STUDENT' group by MONTH(created_date)";
						//echo $sql;
						$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
						$a=1;
						while($row2 = $result2->fetch_assoc()) {
					  ?>
						<?php echo $row2['count']; ?>, 
						<?php

						}
		
		
					   ?>
						
						],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->
			  
			  

            </div>
          </div>
        </div>
		
		
		  <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Staff</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: [	
					  <?php
						$sql = "SELECT MONTHNAME(created_date) as bulan, count(*) FROM student_attendance group by MONTH(created_date)";
						//echo $sql;
						$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						$a=1;
						while($row = $result->fetch_assoc()) {
					  ?>					  
					  '<?php echo $row['bulan']; ?>', 
					  <?php
						}
					   ?>
					  ],
                      datasets: [{
                        label: 'staff',
                        data:[
						<?php
						$sql2 = "SELECT MONTH(created_date) as bulan, count(*) as count FROM student_attendance INNER JOIN stud_rec WHERE category = 'STAFF' group by MONTH(created_date)";
						//echo $sql;
						$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
						$a=1;
						while($row2 = $result2->fetch_assoc()) {
					  ?>
						<?php echo $row2['count']; ?>, 
						<?php
						}
					   ?>
						],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>
		


        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jabatan</h5>

              <!-- Bar Chart -->
              <canvas id="staff" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#staff'), {
                    type: 'bar',
                    data: {
                      labels: [
					  <?php
						$sql3 = "SELECT department, count(*) FROM `student_attendance` 
						JOIN stud_rec ON student_attendance.id_stud_rec=stud_rec.id GROUP BY department";
						//echo $sql;
						$result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
						$a=1;
						while($row3 = $result3->fetch_assoc()) {
					  ?>
					  '<?php echo $row3['department']; ?>', 
						<?php } ?>
					  ],
                      datasets: [{
                        label: 'Jabatan',
                        data: [
						<?php
						$sql4 = "SELECT department, count(*) as count FROM `student_attendance` 
						JOIN stud_rec ON student_attendance.id_stud_rec=stud_rec.id GROUP BY department";
						//echo $sql;
						$result4 = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
						$a=1;
						while($row4 = $result4->fetch_assoc()) {
					  ?>
					  <?php echo $row4['count']; ?>, 
					  <?php } ?>
					  ],
                        backgroundColor: [
                          'rgb(217, 246, 211 )',
                          'rgb(255, 152, 162)',
                          'rgb(255, 255, 200)',
                          'rgb(255, 223, 192)',
                         
                        ],
                        borderColor: [
                          'rgb(217, 246, 211 )',
                          'rgb(255, 152, 162)',
                          'rgb(255, 255, 200)',
                          'rgb(255, 223, 192)',
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Bar CHart -->
            </div>
          </div>
        </div>
      </div>
    </section>
        <!-- Recent Activity -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TOP ATTENDANCE <span>| Today</span></h5>

              <!-- Recent Activity Content -->
              <div class="activity">
			  
			  <?php
					$sql = "SELECT  
						student_attendance.id_student_attendance as id,
						stud_rec.ic as ic,
						stud_rec.name as name,
						stud_rec.gender as gender,
						stud_rec.department as department,
						count(*) as count,
						stud_rec.category as category
						FROM 
					student_attendance 
					JOIN stud_rec ON student_attendance.id_stud_rec=stud_rec.id 
					group by student_attendance.id_stud_rec  
					ORDER BY count DESC
					";
					//echo $sql;
					$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					$a=1;
					while($row = $result->fetch_assoc()) {
				 
					?>
					

                <!-- Recent Activity Items -->
                <div class="activity-item d-flex">
                  <div class="activite-label">TOP <?php echo $a++; ?></div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                   <a href="#" class="fw-bold text-dark">  </a>  <?php echo $row['name'];?>  <b><span>
				   | <?php echo $row['category'];?> | 
					<?php echo $row['count'];?> TIMES</span></b>
                  </div>
                </div><!-- End activity item-->
				<?php
					}
					?>
              </div>
            </div>
          </div><!-- End Recent Activity -->
		  
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