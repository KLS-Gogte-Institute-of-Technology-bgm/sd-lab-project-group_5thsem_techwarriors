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

<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation Message</title>
		<?php
			$server="localhost";
			$username="root";
			$password="root";
			$database="busreservation";
			$connection=mysqli_connect($server, $username, $password, $database);
			if(!$connection){
  		  		die("Uh oh, ".mysqli_connect_error()." contact Owais immediately!");
			}
		?>
		<style type="text/css">
			a:link{
				text-decoration: none;
			}
			a:visited{
				text-decoration: none;
				color: #b1b1b1;
			}
			a: hover{
				text-decoration: none;
			}
			a:active{
				text-decoration: none;
				background-color: black;
			}
			a.next:link{
				font-size: 15px;
				color: black;
			}
			a.next:visited{
				color: black;
			}
			a.next: hover{
				
			}
			a.next:active{
				font-size: 15px;
				color: black;
			}

			body{
				background-image: url('pagebg.png');
    			background-repeat: no-repeat;
    			background-attachment: fixed;
    			background-position: top; 
			}
			p{
				line-height: 0.0;
			}
			#header{
				background-color: #2e2e2e;
				margin-top: -10px;
				margin-left: -10px;
				height: 45px;
				font-size: 20px;
				width: 1400px;
			}
			table.receipt {
   				border: 1px solid black;
			}
		</style>
	</head>
<body>
	<div id="header">
		<table>
			<tr>
				<td>&nbsp&nbsp</td>
				<td style="color: #a5baff; font-size: 9px; font-weight: bold"><p>Department</p>of Transport&nbsp&nbsp</td>
				<td style="color: white">|&nbsp</td>
				<td><a href="welcome.html">Home</a>&nbsp&nbsp&nbsp</td>
				<td><a href="status.html">Status</a></td>
			</tr>
		</table>
	</div>
	<h2>Thanks, here's your receipt...</h2>
	<hr>
	<h4><strong>Please note down the transaction ID</strong></h4>
	<table class="receipt">
		<th align="center">INFORMATION RECEIPT</th>
		<tr>
			<td><b><hr>Transaction ID</b>: <?php $sql="SELECT txnid FROM payments order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%d\n",$row[0]);
    	}
  		mysqli_free_result($result);
	} ?><hr></td>
		</tr>
		<tr>
			<td><strong>Name:</strong> <?php $sql="SELECT gender,fname,lname FROM tickets order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s. %s %s\n",$row[0],$row[1],$row[2]);
    	}
  		mysqli_free_result($result);
	} ?></td>
		</tr>
		<tr>
			<td><strong>From:</strong> <?php $sql="SELECT fromwhere FROM tickets order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s\n",$row[0]);
    	}
  		mysqli_free_result($result);
	} ?>&nbsp&nbsp|&nbsp&nbsp<strong>To:</strong> <?php $sql="SELECT towhere FROM tickets order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s\n",$row[0]);
    	}
  		mysqli_free_result($result);
	} ?></td>
		</tr>
		<tr>
			<td><strong>Pickup:</strong> <?php $sql="SELECT travelday, travelmonth,arrivaltime FROM tickets order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s %d, 2017 at %s\n",$row[1], $row[0], $row[2]);
    	}
  		mysqli_free_result($result);
	} ?></td>
		</tr>
		<tr>
			<td><strong>Seat No.:</strong> <?php $sql="SELECT seat FROM tickets order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s\n",$row[0]);
    	}
  		mysqli_free_result($result);
	} ?></td>
	</tr>
	<tr>
			<td><strong>Type:</strong> <?php $sql="SELECT bustype FROM tickets order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s\n",$row[0]);
    	}
  		mysqli_free_result($result);
	} ?></td>
		</tr>
		<tr><td><hr><hr></td></tr>
		<tr>
			<td><b>TOTAL: &nbsp&nbsp&nbsp &#8377 <?php $sql="SELECT price FROM payments order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s\n",$row[0]);
    	}
  		mysqli_free_result($result);
	} ?></b></td>
		</tr>
		<tr>
			<td><strong>Paid via:</strong> &nbsp&nbsp&nbsp<?php $sql="SELECT cardname, paybrand, paytype FROM payments order by ID DESC LIMIT 1";
	if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("%s's %s %s\n",$row[0], $row[1], $row[2]);
    	}
  		mysqli_free_result($result);
	} ?></td>
		</tr>
	</table><br>
	<table>
		&nbsp&nbsp
			<button><a href="welcome.html" class="next">FINISH</a></button>
	</table>
</body>
</html>
<footer>
	<br><br><br><br><br>
	<hr>
  <center><p>Created by Nelson, Bharatha, Aruna and Owais</p></center>
</footer>
