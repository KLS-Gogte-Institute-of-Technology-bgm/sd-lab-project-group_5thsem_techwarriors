<html>
    <body>
        <h2>Database management for bus reservation system project</h2>
        <hr>
        <form action="dbcreator.php" method="post">
            <input type="submit" name="create" value="CREATE DATABASE"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="delete" value="DELETE DATABASE"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b><a href="welcome.html">Go to "Welcome" page</a></b>
        </form>
        <h3>Output:</h3>
    </body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['create'])){
        createdb();
    }else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete'])){
        deletedb();
    }


    function createdb(){
        $server="localhost";
        $username="owais";
        $password="password";
        $connection=mysqli_connect($server, $username, $password);
    
        if(!$connection){
            die("Login error: ".mysqli_connect_error().", check username or password, check if mySQL is running or contact Owais immediately!");
        }

        $dbcreate = "CREATE DATABASE busreservation;";

        if (mysqli_query($connection, $dbcreate)){
            echo "Database created successfully\n<br>";
        }else{
            echo "Database already exists<br>" . mysqli_error($conn);
        }

        $dbuse="USE busreservation;";

        if (mysqli_query($connection, $dbuse)){
            echo "Selected database\n<br>";
        }else{
            echo "Error selecting database: <br>" . mysqli_error($conn);
        }    


        $tablecreatepayments="CREATE TABLE payments (ID int NOT NULL AUTO_INCREMENT, price int(4), txnid varchar(6), paytype char(15), cardno varchar(16), cardname char(40), cvv int(3), paybrand char(20), expiresmm char(10), expiresyy int(4), PRIMARY KEY (ID));";
        $tablecreatetickets="CREATE TABLE tickets (ID int NOT NULL AUTO_INCREMENT, fname char(40), lname char(40), email varchar(40), phno varchar(15), gender char(2), seat varchar(3), fromwhere varchar(20), towhere char(20), bustype char(20), travelday int(2), travelmonth char(10), arrivaltime varchar(8), PRIMARY KEY (ID));";


        if (mysqli_query($connection, $tablecreatetickets)){
            echo "Created tickets table\n<br>";
        }else{
            echo "Table 'tickets' already exists: <br>" . mysqli_error($conn);
        }    

        if (mysqli_query($connection, $tablecreatepayments)){
            echo "Created payments table\n<br>";
        }else{
            echo "Table 'payments' already exists: <br>" . mysqli_error($conn);
        }

    }    

    function deletedb(){
        $server="localhost";
        $username="root";
        $password="root";
        $connection=mysqli_connect($server, $username, $password);
    
        if(!$connection){
            die("Uh oh, ".mysqli_connect_error()." contact TechWarriors immediately!");
        }

        $dbdelete = "DROP DATABASE busreservation;";

        if (mysqli_query($connection, $dbdelete)){
            echo "Database deleted successfully\n<br>";

        }else{
            echo "Database does not exist" . mysqli_error($conn);
        }
    }


/*
CREATE DATABASE busreservation;
CREATE TABLE payments (
    ID int NOT NULL AUTO_INCREMENT,
    price int(4),
    txnid varchar(6),
    paytype char(15),
    cardno varchar(16),
    cardname char(40),
    cvv int(3),
    paybrand char(20),
    expiresmm char(10),
    expiresyy int(4),
    PRIMARY KEY (ID)
); 
CREATE TABLE tickets (
    ID int NOT NULL AUTO_INCREMENT,
    fname char(40),
    lname char(40),
    email varchar(40),
    phno varchar(15),
    gender char(2),
    seat varchar(3),
    fromwhere varchar(20),
    towhere char(20),
    bustype char(20),
    travelday int(2),
    travelmonth char(10),
    arrivaltime varchar(8),
    PRIMARY KEY (ID)
); 
*/

?>




