<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Bank Camp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height:200px;
            background-color: #f2f2f2;
           
        }
        .container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            height:400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        h1 {
            font-size: 36px;
            color: #e74c3c;
            text-align: center;
        }
        .notification-container {
            text-align: left;
            margin-top:30px;
            margin-left:20px;
            margin-right: 20px;
            position: relative;
        }
        .notification-button {
            background-color: #e74c3c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
            z-index: 2;
        }
        .notification-badge {
            background-color: #fff;
            color: #e74c3c;
            font-weight: bold;
            border-radius: 50%;
            padding: 3px 8px;
            margin-left: 5px;
        }
        .notification-content {
            display: none;
            position: absolute;
            top: 100%; /* Position below the button */
            right: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
            width: 100%; /* Set width to maximum */
        }
        .notification-content p {
            font-size: 16px;
        }
        .notification-content ul {
            list-style-type: none;
            padding: 0;
        }
        .notification-content ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Blood Bank Camp</h1>
        <div class="notification-container">
        
            <button class="notification-button" id="notificationButton">Notifications
                <span class="notification-badge" id="notificationBadge">0</span>
            </button>
            <div class="notification-content" id="notificationContent"></div>
        </div>
    </div>

<script>
    const notificationButton = document.getElementById('notificationButton');
    const notificationContent = document.getElementById('notificationContent');
    const notificationBadge = document.getElementById('notificationBadge');


    let notificationCount = 0; 
    fetch('https://localhost/notification.php')
        .then(response => response.json())
        .then(data => {
            const notifications = data;
            notificationCount = notifications.length; // Initialize the count
            notificationBadge.innerText = notificationCount.toString();
        });

    notificationButton.addEventListener('click', () => {
        if (notificationContent.style.display === 'block') {
            notificationContent.style.display = 'none';
        } else {
            notificationContent.style.display = 'block';

            fetch('https://localhost/notification.php')
                .then(response => response.json())
                .then(data => {
                    const notifications = data;

                    notificationCount = notifications.length;
                    notificationBadge.innerText = notificationCount.toString();

                    displayNotifications(notifications);
                });
        }

        notificationCount = 0;
        notificationBadge.innerText = '0';
    });

    function displayNotifications(notifications) {

        notificationContent.innerHTML = '';

        if (notifications.length === 0) {
            
            notificationContent.innerHTML = '<p>No new notifications.</p>';
        } else {
            const notificationList = document.createElement('ol'); 
            notifications.forEach(notification => {
                const listItem = document.createElement('li');
                listItem.textContent = notification;
                notificationList.appendChild(listItem);
            });
            notificationContent.appendChild(notificationList);
        }
    }
</script>

</body>
</html>

