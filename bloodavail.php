<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blood Bank Search</title>
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
    <h1>Blood Bank Search</h1>
<nav>
        <ul>
            <li><a href="https://localhost/bloodbank.html">Home</a></li>
            <li><a href="https://localhost/donorlogin.php">Donor Login</a></li>
            <li><a href="https://localhost/campsearch.php">Blood Donation Camp</a></li>
        </ul>
    </nav>
    <form method="POST" action="">
        <label for="blood_group">Select Blood Group:</label>
        <select name="blood_group" id="blood_group">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
        <input type="submit" name="submit" value="Search">
    </form>
<?php
if (isset($_POST['submit'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $blood_group = $_POST['blood_group'];
    $sql = "SELECT hospitals.hname,hospitals.hemail,hospitals.hphone,hospitals.location,bloodinfo.bid,bloodinfo.bg,bloodinfo.Available FROM `hospitals` INNER JOIN bloodinfo ON bloodinfo.hid=hospitals.hid  WHERE bg= '$blood_group'";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "<h2>Results for Blood Group: $blood_group</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Hospital Name</th><th>Hospital Mail</th><th>Hospital Phone</th><th>Location</th><th>Blood Group</th><th>Stock Available</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['hname'] . "</td>";
            echo "<td>" . $row['hemail'] . "</td>";
            echo "<td>" . $row['hphone'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['bg'] . "</td>";
            echo "<td>" . $row['Available'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No results found for Blood Group: $blood_group</p>";
    }
    $conn->close();
}
?>

</body>
</html>
