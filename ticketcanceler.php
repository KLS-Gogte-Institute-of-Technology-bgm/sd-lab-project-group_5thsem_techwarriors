<!--
busreservationsystem
    Copyright (C) 2017  Owais Shaikh

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
    	die("Uh oh, ".mysqli_connect_error()." contact Owais immediately! ");
	}
	$txnid=$_POST['txnbox'];
	$sql="DELETE payments, tickets FROM payments INNER JOIN tickets ON payments.id=tickets.id WHERE txnid='$txnid'";

	if(mysqli_query($connection, $sql)){
    	header("Location: cancelsuccess.html");
	}else{
    	echo "Error: Contact Owais Immediately!".mysqli_error($connection);
	}
	mysqli_close($connection);
?>