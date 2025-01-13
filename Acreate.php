<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$id = $ic = $name = $gender = $department = $lasttime = $totalattend = $category = "";
$id_err = $ic_err = $name_err = $gender_err = $department_err = $lasttime_err = $totalattend_err = $category_err = "";

// Initialize $conn and $stmt
$conn = mysqli_connect($host, $db_user, $db_pwd, $db_name);
$stmt = null;

// Check if the connection is successful
if ($conn) {
    // Connection successful
    echo "Connection successful";
} else {
    // Display connection error
    die("Connection failed: " . mysqli_connect_error());
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate other fields.

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
                echo "Oops! Something went wrong. Please try again later.";
            }
        } else {
            echo "Database connection error or \$conn is not defined.";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">DETAIL</h2>
            
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
					   <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="id" class="form-control <?php echo (!empty($id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $id; ?>">
                            <span class="invalid-feedback"><?php echo $id_err;?></span>
                        </div>
					   
					   <div class="form-group">
                            <label>Ic</label>
                            <input type="text" name="ic" class="form-control <?php echo (!empty($ic_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ic; ?>">
                            <span class="invalid-feedback"><?php echo $ic_err;?></span>
                        </div> 
						
						<div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
						
						 <div class="form-group">
                            <label>Gender</label>
                            <input type = "text" name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gender; ?>">
                            <span class="invalid-feedback"><?php echo $gender_err;?></span>
                        </div>
						
						<div class="form-group">
                            <label>Department</label>
                            <input type = "text" name="department" class="form-control <?php echo (!empty($department_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $department; ?>">
                            <span class="invalid-feedback"><?php echo $department_err;?></span>
                        </div>
						
                        <div class="form-group">
                            <label>Time</label>
                            <input type="text" name="lasttime" class="form-control <?php echo (!empty($lasttime_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lasttime; ?>">
                            <span class="invalid-feedback"><?php echo $lasttime_err;?></span>
                        </div>
					
						<div class="form-group">
                            <label>Total Attendance</label>
                            <input type = "text" name="totalattend" class="form-control <?php echo (!empty($totalattend_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $totalattend; ?>">
                            <span class="invalid-feedback"><?php echo $totalattend_err;?></span>
                        </div>

						  <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control <?php echo (!empty($categpory_err)) ? 'is-invalid' : ''; ?>" >
                                 <option value = "" disable> Select a category </option>
								 <option value = "student" <?php if ($category == "student") echo "selected"; ?>>STUDENT</option>
								 <option value = "staff" <?php if ($category == "staff") echo "selected" ; ?>>STAFF</option>
						    </select>
							<span class = "invalid-feedback"><?php echo $categpory_err?></span>
                        </div>
						
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="Arecord.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>