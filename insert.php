<?php  //Start the Session

		require('config.php');
	
  

		extract($_REQUEST);
		 
		
		$query = "INSERT INTO stud_rec(ic, name, gender, department, category)
		VALUES ('$ic','$name','$gender','$department','$category')";
		 

		mysqli_query($conn, $query) or die(mysqli_error($conn));
	 
	    header('location:Arecord.php');
	
?>