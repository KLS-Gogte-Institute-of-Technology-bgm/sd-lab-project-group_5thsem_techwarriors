<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="busreservation";
	$connection=mysqli_connect($server, $username, $password, $database);
	if(!$connection){
    	die("Uh oh, ".mysqli_connect_error()." contact Owais immediately! ");
	}
	$txnid=$_POST['txnbox'];
	$sql="DELETE payments, tickets FROM payments INNER JOIN tickets ON payments.id=tickets.id WHERE txnid='$txnid'";

	if(mysqli_query($connection, $sql)){
    	header("Location: cancelsuccess.html");
	}else{
    	echo "Error: Contact TechWarriors Immediately!".mysqli_error($connection);
	}
	mysqli_close($connection);
?>