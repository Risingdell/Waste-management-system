<?php
session_start(); // Assuming user login is tracked via session

// Include the header
include 'header.php';

// Placeholder data for waste pickup schedule and progress (would come from a database in a real application)
$pickup_schedule = [
    ["date" => "2024-09-10", "status" => "Scheduled"],
    ["date" => "2024-09-15", "status" => "Pending"],
    ["date" => "2024-09-20", "status" => "Collected"],
];

// Placeholder for reminders (would come from a database or session)
$reminders = ["2024-09-10", "2024-09-20"];

// Function to check if a reminder is set
function hasReminder($date) {
    global $reminders;
    return in_array($date, $reminders);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Pickup Schedule</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="schedule-page">
        <h1>Your Waste Pickup Schedule</h1>

        <!-- Pickup Schedule Section -->
        <section class="pickup-schedule">
            <h2>Upcoming Pickup Days</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reminder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pickup_schedule as $pickup) {
                        $reminder_button = hasReminder($pickup['date']) ? 
                            "<button class='reminder-set' disabled>Reminder Set</button>" : 
                            "<button class='set-reminder'>Set Reminder</button>";
                        echo "<tr>
                                <td>{$pickup['date']}</td>
                                <td>{$pickup['status']}</td>
                                <td>$reminder_button</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Add/Edit Reminder Section -->
        <section class="reminder-section">
            <h2>Set/Edit Reminders</h2>
            <form action="set_reminder.php" method="post">
                <label for="reminder-date">Select Date:</label>
                <input type="date" id="reminder-date" name="reminder-date" required>
                <button type="submit">Set Reminder</button>
            </form>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
