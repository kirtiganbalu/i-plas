<?php
// Include config file
require_once "config.php";

$sql_record= "SELECT *FROM stud_rec";
$result =mysqli_query($conn,$sql_record);

// Define variables and initialize with empty values
$id = $ic = $name = $gender = $department = $lasttime = $totalattend = $category ="";
$id_err = $ic_err = $name_err = $gender_err = $department_err = $lasttime_err = $totalattend_err = $category_err ="";

// Search functionality
if ($_SERVER["REQUEST_METHOD"] == "POST ") {
    $search = trim($_POST["query"]);

    $sql = "SELECT * FROM record WHERE 
            id LIKE '%$search%' OR 
            ic LIKE '%$search%' OR 
            name LIKE '%$search%' OR 
            gender LIKE '%$search%' OR 
            category LIKE '%$search%' OR 
            department LIKE '%$search%' OR 
            lasttime LIKE '%$search%' OR 
            totalvisit LIKE '%$search%'";
    $result = mysqli_query($link, $sql);

    if (!$result) {
        die("Error in SQL query: " . mysqli_error($link));
    }
}
?>
<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$id = $ic = $name = $gender = $department = $lasttime = $totalattend = $category = "";
$id_err = $ic_err = $name_err = $gender_err = $department_err = $lasttime_err = $totalattend_err = $category_err = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields (implement your validation logic here)

    // Check input errors before inserting into the database
    if (empty($id_err) && empty($ic_err) && empty($name_err) && empty($gender_err) && empty($department_err) && empty($lasttime_err) && empty($totalattend_err) && empty($category_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO stud_rec (id, ic, name, gender, department, time, total_attendance, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Check if $conn is defined before using it
        if ($conn && $stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_id, $param_ic, $param_name, $param_gender, $param_department, $param_lasttime, $param_totalattend, $param_category);

            // Set parameters
            $param_id = $id;
            $param_ic = $ic;
            $param_name = $name;
            $param_gender = $gender;
            $param_department = $department;
            $param_lasttime = $lasttime;
            $param_totalattend = $totalattend;
            $param_category = $category;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to the landing page
                header("location: Arecord.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later. " . mysqli_error($conn);
            }
        } else {
            echo "Database connection error or \$conn is not defined. " . mysqli_error($conn);
        }

        // Close statement if it is defined
        if ($stmt) {
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
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
        <a class="nav-link collapsed" href="login.php">
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
      <h1>Data Tables</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

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
						<th>Time</th>
						<th>Category</th>
						
					</tr>
				</thead>
				<tbody>
				 <?php
					while($row=mysqli_fetch_assoc($result))
					{
				 
					?>
					<tr>
						<td> <?php echo $row['id'];?> </td>
						<td><?php echo $row['ic'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['department'];?></td>
						<td><?php echo $row['total_attendance'];?></td>
						<td><?php echo $row['time'];?></td>
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