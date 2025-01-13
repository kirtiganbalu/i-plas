 <?php

date_default_timezone_set("Asia/Kuala_Lumpur");
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "iplas"; 
 
// create connection 
$conn = new mysqli($localhost, $username, $password, $dbname); 
 
// check connection 
if($conn->connect_error) {
    die("connection failed : " . $conn->connect_error);
} else {
    // echo "Successfully Connected";
	
}
?>
