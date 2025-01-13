<?php
//Include config file
require_once "config.php";

//Define variable and initialize with empty values
$id = $ic = $name = $gender = $department = $lasttime = $totalattend = "";
$id_err = $ic_err = $name_err = $gender_err = $department_err = $lasttime_err = $totalattend_err = "";

//Processing form data when form is submitted
if ($_SERVER ["REQUEST_METHOD"] == "POST" ){
	
	//Validate name
	$input_CustomersName = trim ($_POST ["CustomersName"]);
	if(empty($input_CustomersName)){
        $CustomersName_err = "Please enter customer name.";
    } elseif(!filter_var($input_CustomersName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $CustomersName_err = "Please enter a valid name.";
    } else{
        $CustomersName = $input_CustomersName;
    }
	
	//Validate phonenumber
	$input_PhoneNumber = trim($_POST["PhoneNumber"]);
    if(empty($input_PhoneNumber)){
        $PhoneNumber_err = "Please enter the phone number.";     
    } else{
        $PhoneNumber = $input_PhoneNumber;
    }
	
	//Validate moviename
	$input_MovieName = trim($_POST["MovieName"]);
    if(empty($input_MovieName)){
        $MovieName_err = "Please choose movie name.";     
    } else{
        $MovieName = $input_MovieName;
    }
	
	//Validate date
	$input_Date = trim($_POST["Date"]);
    if(empty($input_Date)){
        $Date_err = "Please choose the date.";     
    } else{
        $Date = $input_Date;
    }
	
	//Validate seat number
	$input_SeatNumber = trim($_POST["SeatNumber"]);
    if(empty($input_SeatNumber)){
        $SeatNumber_err = "Please choose seat number.";     
    } else{
        $SeatNumber = $input_SeatNumber;
    }
	
	//Validate ticket time
	$input_TicketTime = trim($_POST["TicketTime"]);
    if(empty($input_TicketTime)){
        $TicketTime_err = "Please choose ticket number.";     
    } else{
        $TicketTime = $input_TicketTime;
    }
	
	//Validate total ticket
	$input_TotalTicket = trim($_POST["TotalTicket"]);
    if(empty($input_TotalTicket)){
        $TotalTicket_err = "Please enter the total ticket.";     
   } else{
        $TotalTicket = $input_TotalTicket;
    }
	
	//Validate price
	$input_Price = trim($_POST["Price"]);
    if(empty($input_Price)){
        $Price_err = "Please enter the price.";     
   } else{
        $Price = $input_Price;
    }
	
	//Validate total price
	$input_TotalPrice = trim($_POST["TotalPrice"]);
    if(empty($input_TotalPrice)){
        $TotalPrice_err = "Please enter the total price.";     
    } else{
        $TotalPrice = $input_TotalPrice;
    }
	
	// Check input errors before inserting in database
    if( empty($CustomerName_err) && empty($PhoneNumber_err) && empty($MovieName_err) && empty($Date_err) && empty($SeatNumber_err) && empty($TicketTime_err) && empty($TotalTicket_err) && empty($Price_err) && empty($TotalPrice_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO booking (CustomersName, PhoneNumber, MovieName, Date, SeatNumber, TicketTime, TotalTicket, Price, TotalPrice ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_CustomersName, $param_PhoneNumber, $param_MovieName, $param_Date, $param_SeatNumber, $param_TicketTime, $param_TotalTicket, $param_Price, $param_TotalPrice);
            
            // Set parameters
            $param_CustomersName = $CustomersName;
			$param_PhoneNumber = $PhoneNumber;
			$param_MovieName = $MovieName;
			$param_Date = $Date;
			$param_SeatNumber = $SeatNumber;
			$param_TicketTime = $TicketTime;
			$param_TotalTicket = $TotalTicket;
			$param_Price = $Price;
			$param_TotalPrice = $TotalPrice;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <center>
	<header>
	<h2>SEA'S CINEMA</h2>
	</header>
	</center>
	<br><br>
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
                    <h2 class="mt-5">CUSTOMER'S DETAIL</h2>
                    <p>Please fill this form and submit to add customer booking to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" name="CustomersName" class="form-control <?php echo (!empty($CustomersName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $CustomersName; ?>">
                            <span class="invalid-feedback"><?php echo $CustomersName_err;?></span>
                        </div>
						
						 <div class="form-group">
                            <label>Phone Number</label>
                            <input type = "text" name="PhoneNumber" class="form-control <?php echo (!empty($PhoneNumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $PhoneNumber; ?>">
                            <span class="invalid-feedback"><?php echo $PhoneNumber_err;?></span>
                        </div>
						
                         <div class="form-group">
                            <label>Movie Name</label>
                            <select name="MovieName" class="form-control <?php echo (!empty($Moviename_err)) ? 'is-invalid' : ''; ?>" >
                                 <option value = "" disable> Select a Movie Name </option>
								 <option value = "PEMANDI JENAZAH" <?php if ($MovieName == "PEMANDI JENAZAH") echo "selected"; ?>>PEMANDI JENAZAH</option>
								 <option value = "172 Days" <?php if ($MovieName == "172 Days") echo "selected" ; ?>>172 Days</option>
								 <option value = "NO WAY UP" <?php if ($MovieName == "172 Days") echo "selected" ; ?>>NO WAY UP</option>
						    </select>
							<span class = "invalid-feedback"><?php echo $MovieName_err?></span>
                        </div>
						
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="Date" class="form-control <?php echo (!empty($Date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Date; ?>">
                            <span class="invalid-feedback"><?php echo $Date_err;?></span>
                        </div>
						
						 <div class="form-group">
                            <label>Seat Number</label>
                            <input type = "text" name="SeatNumber" class="form-control <?php echo (!empty($SeatNumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $SeatNumber; ?>">
                            <span class="invalid-feedback"><?php echo $SeatNumber_err;?></span>
                        </div>
						
						 <div class="form-group">
                            <label>Ticket Time</label>
                            <input type = "time" name="TicketTime" class="form-control">
                        </div>
						
						<div class="form-group">
                            <label>Total Ticket</label>
                            <input type = "text" name="TotalTicket" class="form-control <?php echo (!empty($Totalticket_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $TotalTicket; ?>">
                            <span class="invalid-feedback"><?php echo $TotalTicket_err;?></span>
                        </div>
						
						<div class="form-group">
                            <label>Ticket Price</label>
                            <select name="Price" class="form-control <?php echo (!empty($Price_err)) ? 'is-invalid' : ''; ?>" >
                                 <option value = "" disable> Select a Ticket Price </option>
								 <option value = "RM18.00" <?php if ($Price == "RM18.00") echo "selected"; ?>>RM18.00</option>
								 <option value = "RM20.00" <?php if ($Price == "RM20.00") echo "selected" ; ?>>RM20.00</option>
								</select>
							<span class = "invalid-feedback"><?php echo $Price_err?></span>
                        </div>
						
						<div class="form-group">
                            <label>Total Price</label>
                            <input type = "text" name="TotalPrice" class="form-control <?php echo (!empty($TotalPrice_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $TotalPrice; ?>">
                            <span class="invalid-feedback"><?php echo $TotalPrice_err;?></span>
                        </div>
						
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
	
	<style>
	header {
		background-color : #pink;
		margin : 0px;
		font-size : 25px;
	}
	
	body{
		background-color : #FDEDEC;
	}
	
	.container {
		max-width : 800px;
		margin : 0 auto;
		background-color : #E2DBDA;
		padding : 20px;
		border-radius : 6px;
		box-shadow : 0 2px 5px rgba (0,0,0,0.2);
	}
	
	footer {
		background-color : #C4ECFF;
	}
	</style>
	
	     <center>
		 <footer><b>NUR QHAIRUNNISA HUMAIRA BINTI AZMAN <br>
		 13DDT21F1102<br>
		 DDT5-ST2<b></footer>
		 </center>	
</body>
</html>