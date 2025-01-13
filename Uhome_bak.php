<?php
// Define variables and initialize with empty values
$id = $ic = $name = $gender = $department = $lasttime = $totalattend = $category ="";
$id_err = $ic_err = $name_err = $gender_err = $department_err = $lasttime_err = $totalattend_err = $category_err ="";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
 
   <div class="image-row"><center>
    <img src="psmza.png" alt="PSMZA Logo" width="240" height="130">
    <img src="KPM.png" alt="KPM Image" width="270" height="140">
    <img src="iPLAS.png" alt="iPLAS Image" width="210" height="150">
  </div>
  <br>
  <header> 
    <center><h2>WELCOME TO PSMZA LIBRARY ATTENDANCE SYSTEM</center></h2> 
  </header>

<style>

     body {
        font-family: 'Times New Roman', Times, serif;
        }
    
     center {
         text-align: center;
         }
     
    header {
      background-color: #ADADAD;
      padding: 0.5px;
          margin-bottom: 0; /* Add this line to remove the bottom margin */
    
        }
    
    h2 {
        font-family: 'Times New Roman', Times, serif;
    }

        .container {
         margin-top: 0; /* Add this line to remove the top margin */
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
      text-align: right;
        }
    

        li {
           display: inline-block;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            display: block;
            text-decoration: none;
            text-align: left;
        }

        .dropdown:hover .dropdown-content {
            display: block;
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
                  <img src="logo.jpg" width="200" height "200" alt="" id = "logo">
                  <span class="d-none d-lg-block"></span>
                </a>
              </div><!-- End Logo -->
      
            <div class="card mb-3">
                <div class="card-body">
          <form method="post" class = "row g-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="ic_number" class="form-label" >Enter IC Number:</label>
            <input type="text" class="form-control" id="ic_number" name="ic_number" required><br>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      
        
<!-- Div untuk memaparkan data -->
<div id="result"></div>
       
<?php
require_once "config.php";

// Persiapkan kueri SQL
$sql = "SELECT * FROM stud_rec WHERE ic = ?";
    
// Persiapkan dan jalankan pernyataan bersiap
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_POST['ic_number']);
$stmt->execute();
$result = $stmt->get_result();

// Periksa jika ada data yang ditemukan
if ($result->num_rows > 0) {
    // Loop melalui hasil dan tampilkan data
    while ($row = $result->fetch_assoc()) {
        echo "Name : " . $row['name'] . "<br>";
        echo "Gender: " . $row['gender'] . "<br>";
        echo "Category : " . $row['category'] . "<br>";
        echo "Department : " . $row['department'] . "<br>";
        // Tambahkan data lain yang ingin ditampilkan di sini
    }
} else {
    echo "Tiada rekod ditemui untuk nombor kad pengenalan tersebut.";
}
// Tutup statement dan sambungan pangkalan data
$stmt->close();
$conn->close();
?>


       

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

</body>

</html>