<?php
// Define variables and initialize with empty values
$id = $ic = $name = $gender = $department = $lasttime = $totalattend = $category ="";
$id_err = $ic_err = $name_err = $gender_err = $department_err = $lasttime_err = $totalattend_err = $category_err ="";
$show_message = false;
$message = "";

require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate IC Number
    if (empty(trim($_POST["ic_number"]))) {
        $ic_err = "Please enter IC Number.";
    } else {
        $ic_number = trim($_POST["ic_number"]);
        // Check if IC Number exists in the database
        $sql = "SELECT * FROM stud_rec WHERE ic = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_ic_number);
            $param_ic_number = $ic_number;
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 0) {
                    $ic_err = "IC Number not found.";
                    echo "<script>alert('IC Number not found.')</script>";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Logout button -->
<li class="nav-item ms-auto"> <!-- Use ms-auto class to push the item to the right -->
    <a class="nav-link collapsed" href="login.php">
        <i class="bi bi-box-arrow-in-left"></i>
        <span>Logout</span>
    </a>
</li><!-- End Login Page Nav -->

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
 
   <div class="image-row"><center>
    <img src="psmza.png" alt="PSMZA Logo" width="200" height="100">
    <img src="KPM.png" alt="KPM Image" width="250" height="100">
    <img src="i-PLAS1.png" alt="iPLAS Image" width="250" height="150">
	
  </div>
  
  <!-- Date/time display -->
  <div class="col-12 text-end"> <!-- Use text-end class to align content to the right -->
    <?php
    // Now you can use date/time functions with the specified timezone
    echo date("H:i:s d-m-Y");

    // Set the default timezone to your desired timezone
    date_default_timezone_set('Asia/Kuala_Lumpur'); // Example: New York timezone
    ?>
  </div>

	<header> 
		<center><h2><marquee behavior="scroll" direction="left">WELCOME TO PSMZA LIBRARY ATTENDANCE SYSTEM</center></h2> </marquee>
	</header>

	<style>

		/* Body background color */
		body {
			background-color: #f0f5f9; /* Warna biru pastel */
			font-family: Arial, sans-serif; /* Font family yang bersih */
		}

		/* Container background color */
		.container {
			background-color: #ffffff; /* Warna latar belakang putih */
			border-radius: 10px; /* Bulatan sudut untuk container */
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow untuk efek kedalaman */
			padding: 20px; /* Ruang dalaman */
		}

		/* Button styles */
		.btn {
			background-color: #4e6bff; /* Warna butang biru lembut */
			color: #ffffff; /* Warna teks putih */
			border: none; /* Tanpa border */
			border-radius: 5px; /* Bulatan sudut untuk butang */
			padding: 10px 20px; /* Ruang dalaman */
			cursor: pointer; /* Kursor tuk diklik */
			transition: background-color 0.3s; /* Transisi semasa hover */
		}

		.btn:hover {
			background-color: #3a4ebf; /* Warna butang biru lebih gelap semasa hover */
		}

		/* Form input styles */
		.form-control {
			border: 1px solid #d1d8e0; /* Border input dengan warna biru lembut */
			border-radius: 5px; /* Bulatan sudut untuk input */
			padding: 10px; /* Ruang dalaman */
			width: 100%; /* Lebar penuh */
			margin-bottom: 15px; /* Ruang bawah */
		}

		/* Form label styles */
		.form-label {
			font-weight: bold; /* Teks tebal */
			margin-bottom: 5px; /* Ruang bawah */
		}

		/* Card styles */
		.card {
			background-color: #ffffff; /* Warna latar belakang putih */
			border-radius: 10px; /* Bulatan sudut untuk card */
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow untuk efek kedalaman */
			padding: 20px; /* Ruang dalaman */
			margin-bottom: 20px; /* Ruang bawah */
		}

		/* Navbar styles */
		.navbar {
			background-color: #4e6bff; /* Warna latar belakang navbar biru lembut */
			padding: 10px 0; /* Ruang dalaman */
		}

		/* Navbar link styles */
		.navbar a {
			color: #ffffff; /* Warna teks putih */
			text-decoration: none; /* Tanpa underline */
			margin: 0 10px; /* Ruang antara pautan */
			transition: opacity 0.3s; /* Transisi semasa hover */
		}

		.navbar a:hover {
			opacity: 0.8; /* Kehijauan sedikit semasa hover */
		}

		/* Header styles */
		header {
			background-color: #4e6bff; /* Warna biru lembut untuk header */
			padding: 20px 0; /* Ruang dalaman */
			color: #ffffff; /* Warna teks putih */
			text-align: center; /* Teks di tengah */
		}

		/* Gaya untuk elemen marquee */
		marquee {
		  font-family: 'Times New Roman', Times, serif; /* Jenis font */
		  font-size: 30px; /* Saiz teks */
		  color: #ffffff; /* Warna teks putih */
		  background-color: #4e6bff; /* Warna latar belakang biru lembut */
		}

		/* Gaya untuk elemen marquee ketika dihover */
		marquee:hover {
		  background-color: #3a4ebf; /* Warna latar belakang biru gelap semasa hover */
		}

		marquee > span {
		  background-color: #4e6bff; /* Warna latar belakang biru lembut */
		  padding: 5px; /* Kurangkan ruang dalaman */
		  border-radius: 10px; /* Bulatan sudut */


		/* Footer styles */
		footer {
			background-color: #4e6bff; /* Warna biru lembut untuk footer */
			padding: 20px 0; /* Ruang dalaman */
			color: #ffffff; /* Warna teks putih */
			text-align: center; /* Teks di tengah */
		}

	</style>
  
  


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

    <div class="container">

<div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->
      
            <div class="card mb-3">
                <div class="card-body">
          <form method="post" class = "row g-3" action="Uhome.php">
            <label for="ic_number" class="form-label" >Enter IC Number:</label>
            <input type="text" class="form-control" id="ic_number" name="ic_number" required><br>
            <div class="col-12">
              <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      
        
		<!-- Div untuk memaparkan data -->
		<div id="result">
		<?php
		require_once "config.php";

		//echo "Haii";
		if(isset($_POST['submit']) && !empty($_POST['submit'])) {
	
		$ic_number = $_POST['ic_number'];
		// Persiapkan kueri SQL
		$sql = "SELECT  * FROM stud_rec WHERE ic = '$ic_number'";
		//echo $sql;
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		$a=1;
		while($row = $result->fetch_assoc()) {
		?>

		<?php echo "NAME : ".$row['name']; ?><br>
		<?php echo "GENDER : ".$row['gender']; ?><br>
		<?php echo "DEPARTMENT : ".$row['department']; ?><br>
		<?php echo "CATEGORY : ".$row['category']; ?><br>

		<a class="btn btn-primary" href="attend.php?id=<?php echo $row['id']; ?>" name="submit" value="submit">Hadir</a>
		<?php
		}
		}
		?>
		
		

			</div>
              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
               
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  <!-- End #main -->

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
	<?php mysqli_close($conn); ?>
</body>

</html>