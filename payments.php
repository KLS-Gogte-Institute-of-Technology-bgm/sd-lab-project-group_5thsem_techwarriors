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

<!DOCTYPE html>
<html>
	<head>
		<title>Pay Now</title>
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
			td.fare{
				color: indigo;
			}
			#header{
				background-color: #2e2e2e;
				margin-top: -10px;
				margin-left: -10px;
				height: 45px;
				font-size: 20px;
				width: 1400px;
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
	<h2>Payment Information</h2>
	<hr>
	<form name="paynow" method="post" action="passengerpayment.php">
	<table>
		<tr><td class="fare"><b><em>&nbsp&nbspYour fare is: &#8377 <?php session_start(); echo $_SESSION['price']=rand(8, 12)*100; ?></b></em></tr></td>
		<b>&nbsp&nbspChoose a payments method below</b>
		<tr>
			<td>&nbsp&nbspPayment Method:&nbsp</td>
			<td>
				<select name="paytype">
					<option value="null">--&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
  					<option value="Debit Card">Debit Card</option>
  					<option value="Credit Card">Credit Card</option>
  					<option value="PayPal">PayPal</option>
  					<option value="Bitcoin">Bitcoin</option>
				</select> 
			</td>&nbsp
		</tr>
		<tr>
			<td>&nbsp&nbspCard Number:&nbsp</td>
			<td> <input type="text" name="cardno" size="26" maxlength="16"> </td>
		</tr>
		<tr>
			<td>&nbsp&nbspName on Card:&nbsp</td>
			<td> <input type="text" name="cardname" size="26"> </td>
		</tr>
		<tr>
			<td>&nbsp&nbspCVV:&nbsp</td>
			<td> <input type="password" name="cvv" size="3" maxlength="3"> </td>
		</tr><br>
		<tr>
			<td>&nbsp&nbspPayments Brand:&nbsp</td>
			<td>
				<select name="paybrand">
					<option value="null">--&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
  					<option value="Visa">Visa</option>
  					<option value="MasterCard">MasterCard</option>
  					<option value="Maestro">Maestro</option>
  					<option value="American Express">American Express</option>
  					<option value="Rupay">Rupay</option>
				</select> 
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<img src="cards.jpeg" style="position: relative;
top: 5px;">
			</td>&nbsp
		</tr>
		<tr>
			<td>&nbsp&nbspExpiry Date: </td>
			<td>
				<select name="expiresmm">
					<option value="null">--</option>
  					<option value="jan">January</option>
	  				<option value="feb">February</option>
  					<option value="mar">March</option>
  					<option value="apr">April</option>
  					<option value="may">May</option>
					<option value="jun">June</option>
  					<option value="jul">July</option>
  					<option value="aug">August</option>
  					<option value="sep">September</option>
  					<option value="oct">October</option>
  					<option value="nov">November</option>
  					<option value="dec">December</option>
				</select> 
				<select name="expiresyy">
					<option value="null">--</option>
  					<option value="2018">2018</option>
	  				<option value="2019">2019</option>
  					<option value="2020">2020</option>
  					<option value="2021">2021</option>
  					<option value="2022">2022</option>
					<option value="2023">2023</option>
  					<option value="2024">2024</option>
  					<option value="2025">2025</option>
  					<option value="2026">2026</option>
    				<option value="2027">2027</option>
    				<option value="2028">2028</option>
    				<option value="2029">2029</option>
    				<option value="2030">2030</option>

				</select> 
			</td>
		</tr>
	</table><br><br>
	<table>
		&nbsp&nbsp
			<input style="font-size: 16px; background-color: #ffffff;" type="submit" name="send" class="next" value="Next >">
	</table>
	</form>
</body>
</html>
<footer>
	<br><br><br><br><br><br><br><br><br><br>
	<hr>
  <center><p>Created by Owais</p></center>
</footer>