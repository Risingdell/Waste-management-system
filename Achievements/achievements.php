<?php
session_start(); // Assuming user login is tracked via session

// Include the header
include 'header.php';

// Placeholder data for badges (would come from a database in a real application)
$available_badges = [
    ["name" => "First Report", "description" => "Submit your first waste report", "criteria" => "1 report", "icon" => "first_report.png"],
    ["name" => "10 Reports", "description" => "Submit 10 waste reports", "criteria" => "10 reports", "icon" => "10_reports.png"],
    ["name" => "Top Contributor", "description" => "Be in the top 3 of your local leaderboard", "criteria" => "Top 3 local leaderboard", "icon" => "top_contributor.png"],
    ["name" => "Environmentalist", "description" => "Submit 50 reports and help keep your community clean", "criteria" => "50 reports", "icon" => "environmentalist.png"],
    // Add more badges
];

// Placeholder earned badges for the logged-in user (would come from the database)
$earned_badges = ["First Report", "10 Reports"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements and Badges</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="achievements-page">
        <h1>Your Achievements and Badges</h1>

        <!-- Earned Badges Section -->
        <section class="earned-badges">
            <h2>Earned Badges</h2>
            <div class="badge-container">
                <?php
                foreach ($available_badges as $badge) {
                    if (in_array($badge['name'], $earned_badges)) {
                        echo "<div class='badge earned'>
                                <img src='images/{$badge['icon']}' alt='{$badge['name']}' class='badge-icon'>
                                <div class='badge-info'>
                                    <h3>{$badge['name']}</h3>
                                    <p>{$badge['description']}</p>
                                </div>
                              </div>";
                    }
                }
                ?>
            </div>
        </section>

        <!-- Available Badges Section -->
        <section class="available-badges">
            <h2>Available Badges</h2>
            <div class="badge-container">
                <?php
                foreach ($available_badges as $badge) {
                    $badge_class = in_array($badge['name'], $earned_badges) ? 'earned' : 'locked';
                    echo "<div class='badge $badge_class'>
                            <img src='images/{$badge['icon']}' alt='{$badge['name']}' class='badge-icon'>
                            <div class='badge-info'>
                                <h3>{$badge['name']}</h3>
                                <p>{$badge['description']}</p>
                                <small>Criteria: {$badge['criteria']}</small>
                            </div>
                          </div>";
                }
                ?>
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
