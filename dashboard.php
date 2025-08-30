<?php
// Assuming a session is used to store the logged-in user
session_start();

// Include header
include 'header.php';

// Placeholder data for the dashboard (In real-life, this data would come from a database)
$reports = [
    ["date" => "2024-09-01", "status" => "Pending", "points" => 10],
    ["date" => "2024-08-29", "status" => "Scheduled", "points" => 15],
    ["date" => "2024-08-25", "status" => "Collected", "points" => 20],
];

$badges = [
    ["title" => "First Report", "description" => "Submitted your first waste report", "achieved" => true],
    ["title" => "5 Reports", "description" => "Submitted 5 waste reports", "achieved" => false],
    ["title" => "Top Contributor", "description" => "Reached the top 10 on the leaderboard", "achieved" => false],
];

// Notifications (sample data)
$notifications = [
    ["message" => "Your report on 2024-09-01 is scheduled for pickup tomorrow."],
    ["message" => "Earn 50 more points to unlock the '5 Reports' badge!"],
];

// Calculate total points
$totalPoints = 0;
foreach ($reports as $report) {
    $totalPoints += $report["points"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main class="dashboard">
        <h1>Welcome to Your Dashboard</h1>

        <!-- Reports Section -->
        <section class="reports">
            <h2>Your Waste Reports</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Points Earned</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?php echo $report["date"]; ?></td>
                        <td><?php echo $report["status"]; ?></td>
                        <td><?php echo $report["points"]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Points Section -->
        <section class="points">
            <h2>Total Points</h2>
            <p>You have earned <strong><?php echo $totalPoints; ?></strong> points in total!</p>
        </section>

        <!-- Badges Section -->
        <section class="badges">
            <h2>Your Achievements</h2>
            <div class="badge-container">
                <?php foreach ($badges as $badge): ?>
                <div class="badge <?php echo $badge["achieved"] ? 'achieved' : 'locked'; ?>">
                    <h3><?php echo $badge["title"]; ?></h3>
                    <p><?php echo $badge["description"]; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Notifications Section -->
        <section class="notifications">
            <h2>Notifications</h2>
            <ul>
                <?php foreach ($notifications as $notification): ?>
                <li><?php echo $notification["message"]; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
