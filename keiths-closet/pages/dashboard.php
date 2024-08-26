<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}

include 'config.php';

// Fetch the logged-in user's details
$userid = $_SESSION['userid'];

$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $userid);
$stmt->execute();
$stmt->bind_result($username, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Dashboard - Keith's Closet</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .header {
            background-color: #cc0000; /* Keith's Closet Red */
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }
        .greeting {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .news-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .news-section h2 {
            color: #cc0000;
            margin-bottom: 15px;
        }
        .news-item {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .news-item img {
            width: 100px;
            height: 100px;
            margin-right: 15px;
            border-radius: 8px;
        }
        .news-item p {
            margin: 0;
        }
        .actions-section {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .action-button {
            padding: 15px 30px;
            background-color: #0044cc; /* Keith's Closet Blue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 18px;
            text-decoration: none;
        }
        .calendar-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($username); ?>!</h1>
    </div>

    <div class="content">

        <div class="greeting">
            <p>Hello <?php echo htmlspecialchars($username); ?>, thank you for being an amazing volunteer!</p>
        </div>

        <div class="news-section">
            <h2>This Week's News</h2>
            <div class="news-item">
                <img src="event1.jpg" alt="Event 1">
                <p>Join us for the upcoming clothing drive on Saturday! Your contributions make a huge difference.</p>
            </div>
            <div class="news-item">
                <img src="event2.jpg" alt="Event 2">
                <p>Thank you to all volunteers who helped with the community outreach event last week. We reached over 200 people!</p>
            </div>
            <!-- Add more news items as needed -->
        </div>

        <div class="actions-section">
            <a href="#calendar" class="action-button">Pick a Shift</a>
            <a href="#contribute" class="action-button">Make a Contribution</a>
        </div>

        <div class="calendar-section" id="calendar">
            <h2>Your Upcoming Shifts</h2>
            <?php echo draw_calendar($month, $year); ?>
            <!-- Include the shift selection code here -->
        </div>

    </div>

    <div class="footer">
        <p>&copy; 2024 Keith's Closet. All rights reserved.</p>
    </div>

    <!-- Include the modal and slider code from previous examples -->

</body>
</html>
