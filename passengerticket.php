<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="busreservation";
	$connection=mysqli_connect($server, $username, $password, $database);
	if(!$connection){
    	die("Uh oh, ".mysqli_connect_error()." contact TechWarriors immediately!");
	}
	$arrivaltime=$_POST['time'];
	$fnamebox=$_POST['fnamebox']; 
	$lnamebox=$_POST['lnamebox']; 
	$emailbox=$_POST['emailbox']; 
	$phnobox=$_POST['phnobox'];
	$gender=$_POST['gender'];
	$seat=$_POST['seat'];
	$from=$_POST['from']; 
	$to=$_POST['to']; 
	$bustype=$_POST['bus_type'];
	$traveldd=$_POST['traveldd'];
	$travelmm=$_POST['travelmm'];
	$sql="INSERT INTO tickets(fname, lname, email, phno, gender, seat, fromwhere, towhere, bustype, travelday, travelmonth, arrivaltime) VALUES('$fnamebox','$lnamebox','$emailbox','$phnobox','$gender', '$seat', '$from','$to','$bustype','$traveldd','$travelmm','$arrivaltime')";
	mysqli_query($sql);
	if(mysqli_query($connection, $sql)){
    	header("Location: payments.php");
	}else{
    	echo "Error, contact TechWarriors immediately! ".$sql."<br>".mysqli_error($connection);
	}
	mysqli_close($connection);
?>