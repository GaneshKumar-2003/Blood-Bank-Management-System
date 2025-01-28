<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Donor Registration</title>
</head>

<html>
<head>
    <meta charset="UTF-8">
    <title>Donor Registration</title>
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
        input[type="password"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 ;
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
    <h1>Donor Registration</h1>
<nav>
        <ul>
            <li><a href="https://localhost/donorlogin.php">Donor Login</a></li>
            <li><a href="https://localhost/bloodavail.php">Blood Bank Availability Search</a></li>
            <li><a href="https://localhost/campsearch.php">Blood Donation Camp</a></li>
        </ul>
    </nav>
    <form method="POST" action="registration.php">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password (at least 8 characters, containing letters, numbers, and symbols):</label>
        <input type="password" id="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" required><br><br>
        
        <label for="age">Age (between 18 and 50):</label>
        <input type="number" id="age" name="age" min="18" max="50" required><br><br>
        
        <label for="aadhar">Aadhar Number:</label>
        <input type="text" id="aadhar" name="aadhar" required><br><br>

        <label for="email">Email ID:</label>
        <input type="text" id="email" name="email" required><br><br>
           
        <label for="phone">Phone no:</label>
        <input type="number" id="phone" name="phone" required><br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required><br><br>
        
        <label for="district">District:</label>
        <input type="text" id="district" name="district" required><br><br>
        
        <label for="blood_group">Blood Group:</label>
        <select id="blood_group" name="blood_group" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select><br><br>
        
        <input type="submit" name="register" value="Register">
    </form>

    </form>
</body>
<?php
if (isset($_POST['register'])) {
    // Database connection parameters
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "bloodbank";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $aadhar = $_POST['aadhar'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $blood_group = $_POST['blood_group'];

    $sql = "INSERT INTO donor (username, password, Name, Age, `Aadhar No`, `Email ID`, District, State, `Blood Group`, `phone no`)
            VALUES ('$username', '$password', '$name', $age, '$aadhar', '$email', '$district', '$state', '$blood_group', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registered successfully'); window.location.href='https://localhost/donorlogin.php';</script>";

    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>




</html>
