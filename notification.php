<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bloodbank';

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = 'SELECT `Name of the Association`, date, venue, time FROM bloodbankcamp';
$result = $conn->query($sql);

$notifications = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Create a notification message for each row and add it to the array
        $notification = "We are happy to inform you that we are hosting a blood donation camp in our society conducted by {$row['Name of the Association']}.The event will start at {$row['time']}, on {$row['date']}, at the {$row['venue']}. We hope your work will help some people gain new life and give them new hope to fight against the hardships of their problems. We are also maintaining some security measures for the safety of our donors. There will be arrangements for some refreshments to support our participants.Your support will help us in completing our program successfully. Your contribution can make a profound impact on the well-being of our community. Join hands with us, and let's make a positive change, one drop at a time.";

        $notifications[] = $notification;
    }
}

$notificationsJson = json_encode($notifications);

header('Content-Type: application/json');
echo $notificationsJson;
?>
