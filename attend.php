<?php  //Start the Session

		require('config.php');
	
  date_default_timezone_set("Asia/Kuala_Lumpur");

		$id_stud_rec =$_GET['id'];
		$created_date =date('Y-m-d');
		 
		$created_time  =date('h:i:s');
		$query = "INSERT INTO student_attendance(id_stud_rec, created_date, created_time)
		VALUES ('$id_stud_rec','$created_date','$created_time')";
		 

		mysqli_query($conn, $query) or die(mysqli_error($conn));
	 
	    header('location:Uhome.php');
	
?>