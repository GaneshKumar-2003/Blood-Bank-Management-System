<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blood Bank Camp Search</title>
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
            text-align: center;
            margin: 20px auto;
            width: 50%;
        }
        label {
            font-weight: bold;
        }
        select {
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #c0392b;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #e74c3c;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Blood Bank Camp Search</h1>
<nav>
        <ul>
            <li><a href="https://localhost/bloodbank.html">Home</a></li>
            <li><a href="https://localhost/donorlogin.php">Donor Login</a></li>
            <li><a href="https://localhost/bloodavail.php">Blood Bank Search</a></li>
        </ul>
    </nav>
    <form method="POST" action="">
        <label for="search_date">Select the Date:</label>
        <input type="date" name="search_date" id="search_date" required>
        <input type="submit" name="submit" value="Search">
    </form>
    <label for="registration"> Do you want to <a href="https://localhost/campregistration.php"> register</a> any Blood Donation Camp?</label>
</body>
<?php

if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $search_date = $_POST['search_date'];
    $sql = "SELECT * FROM `bloodbankcamp` WHERE date= '$search_date'";
    $result = $conn->query($sql);

    
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    
    if ($result->num_rows > 0) {
        echo "<h2>Results for Blood Donation Camp at $search_date</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name of the Association</th><th>Camp Mail ID</th><th>Camp Phone no</th><th>Date</th><th>Venue</th><th>Time</th><th>District</th><th>State</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Name of the Association'] . "</td>";
            echo "<td>" . $row['Email ID'] . "</td>";
            echo "<td>" . $row['phone no'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['venue'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['District'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No results found for Blood Donation Camp on $search_date</p>";
    }
    $conn->close();
}
?>
</html>
