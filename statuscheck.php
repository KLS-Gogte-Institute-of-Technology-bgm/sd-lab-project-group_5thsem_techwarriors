<!DOCTYPE html>
<html>
		<head>
		<title>Bus Cancellation</title>
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
			table.out{
   				border: 1px solid black;
			}
		</style>
	</head>
	<body>
	<div id="header">
		<table>
			<tr>
				<td>&nbsp&nbsp</td>
				<td style="color: #a5baff; font-size: 9px; font-weight: bold"><p>BookMyBus</td>
				<td style="color: white">|&nbsp</td>
				<td><a href="welcome.html">Home</a>&nbsp&nbsp&nbsp</td>
				<td><a href="ticket.html">Reservation&nbsp&nbsp&nbsp</a></td>
				<td><a href="status.html">Status</a></td>
			</tr>
		</table>
	</div>
	<h2>Here's your journey info: </h2>
	<hr>
<?php
	$server="localhost";
	$username="owais";
	$password="password";
	$database="busreservation";
	$connection=mysqli_connect($server, $username, $password, $database);
	if(!$connection){
 	 	die("Uh oh, ".mysqli_connect_error()." contact TechWarriors immediately!");
	}
	$txnid=$_POST['txnbox'];
	$sql="SELECT * FROM payments INNER JOIN tickets ON payments.id=tickets.id WHERE txnid='$txnid'";
	mysqli_query($sql);
    if($result=mysqli_query($connection,$sql)){
  		while ($row=mysqli_fetch_row($result)){
    		printf("<b>Passenger No.:</b> #%s\n",$row[1]); echo "<br>";
    		printf("<b>Passenger Name:</b> %s.\n",$row[15]);
    		printf("%s\n",$row[11]);
    		printf("%s\n",$row[12]); echo "<br>";
    		printf("<b>Seat No.:</b> %s\n",$row[16]); echo "<br>";
    		printf("<b>From:</b> %s\n",$row[17]); echo "<br>";
    		printf("<b>To:</b> %s\n",$row[18]); echo "<br>";
    		printf("<b>Vehicle Type:</b> %s\n",$row[19]); echo "<br>";
    		printf("<b>Departure Date: </b>%s\n",$row[21]);
    		printf("%s, 2017\n",$row[20]); echo "<br>";
    		printf("<b>Departure Time</b>: %s\n",$row[22]); echo "<br>";
    	}
    }else{
   		echo "Error: contact TechWarriors immediately! ".$sql."<br>".mysqli_error($connection);
	}
	mysqli_close($connection);
?>
<br><button><a href="welcome.html" class="next">< GO HOME</a></button>
</body>
</html>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1>Your ticket was either cancelled or not reserved...</h1>
