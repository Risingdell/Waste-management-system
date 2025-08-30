<?php
session_start(); // Assuming a session is used to track the logged-in user

// Include the header
include 'header.php';

// Placeholder data for leaderboards (would come from the database in real applications)
$global_leaderboard = [
    ["username" => "JohnDoe", "points" => 1000, "badges" => 5],
    ["username" => "JaneSmith", "points" => 950, "badges" => 4],
    ["username" => "User123", "points" => 900, "badges" => 4],
    // Add more users as necessary
];

$local_leaderboard = [
    ["username" => "LocalHero", "points" => 600, "badges" => 3],
    ["username" => "JaneSmith", "points" => 550, "badges" => 2],
    ["username" => "JohnDoe", "points" => 500, "badges" => 2],
    // Add more users in the same region
];

// Logged-in user's information (would typically come from a database or session)
$logged_in_user = [
    "username" => "LoggedInUser",
    "points" => 650,
    "badges" => 3,
    "global_rank" => 5,  // Placeholder rank
    "local_rank" => 2    // Placeholder rank
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .color{
            color:black;

        }
    </style>
</head>
<body>
    <main class="leaderboard">
        <h1>Leaderboard</h1>

        <!-- Logged-in User's Rank -->
        <section class="user-rank">
            <h2>Your Rank</h2>
            <p><strong>Global Rank:</strong> #<?php echo $logged_in_user['global_rank']; ?> | <strong>Local Rank:</strong> #<?php echo $logged_in_user['local_rank']; ?></p>
            <p><strong>Your Points:</strong> <?php echo $logged_in_user['points']; ?></p>
            <p><strong>Badges:</strong> <?php echo $logged_in_user['badges']; ?></p>
        </section>

        <!-- Global Leaderboard -->
        <section class="global-leaderboard">
            <h2>Global Leaderboard</h2>
            <table>
                <thead>
                    <tr class="color">
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Points</th>
                        <th>Badges</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 1;
                    foreach ($global_leaderboard as $user) {
                        $highlight_class = ($user['username'] == $logged_in_user['username']) ? 'highlight' : '';
                        echo "<tr class='$highlight_class'>
                                <td>$rank</td>
                                <td>{$user['username']}</td>
                                <td>{$user['points']}</td>
                                <td>{$user['badges']}</td>
                              </tr>";
                        $rank++;
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Local Leaderboard -->
        <section class="local-leaderboard">
            <h2>Local Leaderboard</h2>
            <table>
                <thead>
                    <tr class="color">
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Points</th>
                        <th>Badges</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rank = 1;
                    foreach ($local_leaderboard as $user) {
                        $highlight_class = ($user['username'] == $logged_in_user['username']) ? 'highlight' : '';
                        echo "<tr class='$highlight_class'>
                                <td>$rank</td>
                                <td>{$user['username']}</td>
                                <td>{$user['points']}</td>
                                <td>{$user['badges']}</td>
                              </tr>";
                        $rank++;
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
