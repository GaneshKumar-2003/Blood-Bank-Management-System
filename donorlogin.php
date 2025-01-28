<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Donor Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }nav {
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
        input[type="password"] {
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
        p {
            text-align: center;
        }
        p a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Donor Login</h1>
<nav>
        <ul>
            <li><a href="https://localhost/bloodbank.html">Home</a></li>
            <li><a href="https://localhost/bloodavail.php">Blood Bank Availability Search</a></li>
            <li><a href="https://localhost/campsearch.php">Blood Donation Camp</a></li>
        </ul>
    </nav>
    <form method="POST" action="donorlogin.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="login" value="Log In">
    </form>
    <p>Do you want to save lives? <a href="https://localhost/registration.php">Register</a> as a Donor!</p>
</body>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "bloodbank";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT username, password FROM donor WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        
        if ($password === $stored_password) {
            echo "<script>alert('Login successfully'); window.location.href='https://localhost/donorpage.html';</script>";
            exit(); // Exit to prevent further execution
        } 
    }

    echo "<script>alert('Username or Password is Incorrect. Try Again'); window.location.href='https://localhost/donorlogin.php';</script>";

    $conn->close();
}
?>


</html>
