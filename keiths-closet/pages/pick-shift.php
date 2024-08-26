<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pick a Shift - Keith's Closet</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Style for the calendar */
        .calendar-container {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .calendar-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }
        .calendar-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .calendar-container th, .calendar-container td {
            padding: 10px;
            cursor: pointer;
        }
        .calendar-container th {
            background-color: #eeeeee;
        }
        .calendar-container td {
            background-color: #f9f9f9;
        }
        .calendar-container td:hover {
            background-color: #dddddd;
        }
        .calendar-container .selected {
            background-color: #ff0000;
            color: #ffffff;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #ffffff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
        }
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Slider styles */
        .slider-container {
            margin: 20px 0;
        }
        .slider {
            width: 100%;
            margin: 15px 0;
        }
        .slider-range {
            width: 100%;
            height: 8px;
            background-color: #ddd;
            border-radius: 5px;
            position: relative;
        }
        .slider-handle {
            position: absolute;
            width: 24px;
            height: 24px;
            background-color: #ff0000;
            border-radius: 50%;
            top: -8px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="calendar-container">
    <h2>Select a Date</h2>
    <!-- Calendar implementation -->
    <table>
        <thead>
            <tr>
                <th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th><th>Su</th>
            </tr>
        </thead>
        <tbody>
            <!-- Assuming this month starts on a Thursday -->
            <tr><td></td><td></td><td></td><td></td><td>1</td><td>2</td><td>3</td></tr>
            <tr><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr>
            <!-- More rows as needed -->
        </tbody>
    </table>
</div>

<div id="timeModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Select Your Shift Time</h2>
        <div class="slider-container">
            <div id="slider-range" class="slider-range"></div>
            <input type="range" min="9" max="19" value="9" step="1" class="slider" id="start-time">
            <input type="range" min="9" max="19" value="17" step="1" class="slider" id="end-time">
        </div>
        <p id="time-range-display">Shift Time: 09:00 - 17:00</p>
        <button onclick="confirmShift()">Confirm Shift</button>
    </div>
</div>

<script>
    let modal = document.getElementById("timeModal");
    let span = document.getElementsByClassName("close")[0];
    let selectedDate;

    document.querySelectorAll(".calendar-container td").forEach(cell => {
        cell.addEventListener("click", function () {
            selectedDate = this.textContent;
            modal.style.display = "block";
            document.querySelectorAll(".calendar-container td").forEach(cell => cell.classList.remove("selected"));
            this.classList.add("selected");
        });
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function updateTimeDisplay() {
        const start = document.getElementById("start-time").value;
        const end = document.getElementById("end-time").value;
        document.getElementById("time-range-display").textContent = `Shift Time: ${formatTime(start)} - ${formatTime(end)}`;
    }

    document.getElementById("start-time").oninput = updateTimeDisplay;
    document.getElementById("end-time").oninput = updateTimeDisplay;

    function formatTime(hour) {
        return `${hour < 10 ? "0" : ""}${hour}:00`;
    }

    function confirmShift() {
        const start = document.getElementById("start-time").value;
        const end = document.getElementById("end-time").value;
        alert(`Shift confirmed on ${selectedDate} from ${formatTime(start)} to ${formatTime(end)}`);
        modal.style.display = "none";
    }
</script>

</body>
</html>
