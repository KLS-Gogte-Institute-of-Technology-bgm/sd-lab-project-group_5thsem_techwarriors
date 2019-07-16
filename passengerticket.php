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
    	echo "Error, contact Owais immediately! ".$sql."<br>".mysqli_error($connection);
	}
	mysqli_close($connection);
?>