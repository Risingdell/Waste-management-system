<?php
// Include the header
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Management Platform</title>
    <link rel="stylesheet" href="stylei.css">
    <style>
        .how-it-works{
            position: sticky;
            top: 0;
            background-color: #333;
            color: white;
            z-index: 1000;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        img{
            border-style: ridge;
            border-radius:20px
        }
        .badge{
            background-color: #F0F8FF ;
            transition-timing-function: ease-out;
        }
        h1{
            background-color:#F5F5DC;
            padding-right:40px;
            padding-left:40px;
            border-right:40px;
            border-left:40px;
        }
        a {
      text-decoration: none;
    }


    a:hover {
      color: blue;
    }
    </style>
</head>
<body style="background-color: sky blue;">
    <!-- Main Content -->
    <main>

        <section class="overview">
            <h1><font style="font-family:'ADLaM Display';font-size:50px;color:black;">ECOGARD</font><br><marquee>Welcome to Our Waste Management Platform</marquee></h1>
            <p>Join us in keeping our community clean! Take a photo, report waste, and earn rewards for your efforts.</p>
        </section>

        <section class="how-it-works">
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <a href="TAKEPHOTO.html">
                        <h3>1. Take a Photo</h3>
                        <p>Find an area where waste needs collection. Snap a photo!</p>
                    </a>
                </div>
                <div class="step">
                    <a href="report.html">
                        <h3>2. Submit the Report</h3>
                        <p>Upload your photo, provide the location, and submit the report to our platform.</p>
                    </a>
                </div>
                <div class="step">
                    <a href="view_reward.html">
                        <h3>3. Earn Points & Rewards</h3>
                        <p>Earn points for every valid report and redeem them for goodies!</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="call-to-action">
            <a href="signup.php" class="btn">Sign Up</a>
            <a href="login.php" class="btn">Log In</a>
            <a href="leaderboard.php" class="btn">View Leaderboard</a>
        </section>

        <section class="achievements">
            <h2>Your Achievements & Rewards</h2>
            <p>Check out the badges and rewards you can earn by contributing to waste management efforts.</p>
            <div class="badges">
                <div class="badge">
                    <img src="https://img.freepik.com/premium-vector/medal-house-clipart-cartoon-style-vector-illustration_761413-4074.jpg?semt=ais_hybrid" alt="Badge 1">
                    <p>Earn your first 100 points!</p>
                </div>
                <div class="badge">
                    <img src="https://cdn0.iconfinder.com/data/icons/gamification-flat-awards-and-badges/500/star2-512.png" alt="Badge 2">
                    <p>Report waste in 5 different areas.</p>
                </div>
                <div class="badge">
                    <img src="https://img.freepik.com/premium-vector/hand-drawn-elegant-golden-design-collection_1267611-460.jpg?semt=ais_hybrid" alt="Badge 3">
                    <p>Reach the top 10 on the leaderboard.</p>
                </div>
            </div>
        </section>

        <!-- Add the loader here -->
        <div class="loader">
            <div style="--i: 1"></div>
            <div style="--i: 2"></div>
            <div style="--i: 3"></div>
            <div style="--i: 4"></div>
        </div>

    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
