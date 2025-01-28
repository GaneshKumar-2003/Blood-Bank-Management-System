<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bloodbank Camp Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        nav {
            background-color: #333;
            padding: 10px 0;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li:last-child {
            margin-right: 0;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }
        h1 {
            background-color: #e74c3c;
            color: #fff;
            text-align: center;
            padding: 0px;
            padding-top:40px;
            margin:0 auto;
            height:100px;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            padding-right:40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Blood Bank Camp Registration</h1>
<nav>
        <ul>
            <li><a href="https://localhost/donorlogin.php">Donor Login</a></li>
            <li><a href="https://localhost/bloodavail.php">Blood Bank Availability Search</a></li>
            <li><a href="https://localhost/campsearch.php">Blood Donation Camp</a></li>
        </ul>
    </nav>
    <form method="POST" action="campregistration.php">
        <label for="campname">Camp Name:</label>
        <input type="text" id="campname" name="campname" required><br><br>
        
        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" required><br><br>
        
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" required><br><br>

        <label for="email">Email ID:</label>
        <input type="text" id="email" name="email" required><br><br>
           
        <label for="phone">Phone no:</label>
        <input type="number" id="phone" name="phone" required><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>
        
        <label for="district">District:</label>
        <input type="text" id="district" name="district" required><br><br>
        
        <label for="time">Time of the Event :</label>
        <input type="text" id="time" name="time" placeholder="9am-5pm" required><br><br>
        
        <input type="submit" name="register" value="Register">
    </form>


<?php
if (isset($_POST['register'])) {
    
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "bloodbank";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $campname = $_POST['campname'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $venue = $_POST['venue'];

    $insertsql = "INSERT INTO `bloodbankcamp` (`Name of the Association`, `Email ID`, `phone no`, District, State, date, venue, time)
                VALUES ('$campname', '$email', '$phone', '$district', '$state', '$date', '$venue', '$time')";
   if ($conn->query($insertsql)) {
   
    echo "<script>alert('Registered successfully'); window.location.href='https://localhost/campsearch.php';</script>";
    } 
     else {
        
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>




</body>
</html>
