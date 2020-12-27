<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="busreservation";
	$connection=mysqli_connect($server, $username, $password, $database);
	if(!$connection){
    	die("Uh oh, ".mysqli_connect_error()." contact TechWarriors immediately!");
	}
	session_start();
	$price=$_SESSION['price'] ; 
	$paytype=$_POST['paytype']; 
	$cardno=$_POST['cardno']; 
	$cardname=$_POST['cardname']; 
	$cvv=$_POST['cvv'];
	$paybrand=$_POST['paybrand'];
	$expiresmm=$_POST['expiresmm'];
	$expiresyy=$_POST['expiresyy']; 
	$txnid=rand(100000, 999999);
	$sql="INSERT INTO payments(price, txnid, paytype, cardno, cardname, cvv, paybrand, expiresmm, expiresyy) VALUES('$price','$txnid','$paytype','$cardno','$cardname','$cvv','$paybrand', '$expiresmm', '$expiresyy')";
	mysqli_query($sql);
	if(mysqli_query($connection, $sql)){
    	header("Location: receipt.php");
	}else{
    	echo "Error: ".$sql."<br>".mysqli_error($connection);
	}
	mysqli_close($connection);
?>