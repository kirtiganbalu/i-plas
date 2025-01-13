<?php
session_start();
include('config.php');

 $username = $_POST['username'];
 $password = $_POST['password'];


 $sql = "select * from login where username='$username' and password='$password'";  
 $result = mysqli_query($conn, $sql);  
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
 $count = mysqli_num_rows($result);  
 $_SESSION['username'] = $username;
 
 if ($count == 1) {
    $_SESSION['username'] = $username;
    if ($row['status'] == 'admin') {
        header("location:index.php");
        exit; // Exit script after redirection
    } else {
        header("location:Uhome.php");
        exit; // Exit script after redirection
    }
	 //echo $row['status'];
     //header("location:index.php");
	 
 }
		  
 else{  
     //echo "<h1> Login failed. Invalid username or password.</h1>";  
     $message = "Username and password does not match";
     echo "<script type='text/javascript'>alert('$message');window.history.back();</script>";
     header("location:login.php");
     
 }     
 

?>