<!--
busreservationsystem
    Copyright (C) 2019  Owais Shaikh

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<?php
	$server="localhost";
	$username="root";
	$password="root";
	$database="busreservation";
	$connection=mysqli_connect($server, $username, $password, $database);
	if(!$connection){
    	die("Uh oh, ".mysqli_connect_error()." contact Owais immediately!");
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