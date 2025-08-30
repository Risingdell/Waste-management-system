<?php
session_start(); // Assuming the user session is tracked

// Placeholder to simulate form submission
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message_body = htmlspecialchars($_POST['message']);
    
    // In a real-world scenario, this would send an email or save to a database
    // Here we simply simulate the message being sent
    $message = "Thank you, $name! Your inquiry has been submitted. We will get back to you at $email.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Support</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="contact-page">
        <h1>Contact Us / Support</h1>
        
        <section class="contact-form">
            <h2>Submit an Inquiry</h2>
            <?php if ($message): ?>
                <p class="success-message"><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="contact_us.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit">Submit Inquiry</button>
            </form>
        </section>

        <section class="faq">
            <h2>Frequently Asked Questions</h2>
            <ul>
                <li>
                    <h3>How do I report waste?</h3>
                    <p>To report waste, click on the "Submit Report" button on the dashboard. Upload a photo, provide a location, and select a waste category.</p>
                </li>
                <li>
                    <h3>How can I earn points?</h3>
                    <p>You earn points by submitting valid waste reports. Points are calculated based on the type of waste and its location.</p>
                </li>
                <li>
                    <h3>How do I track the progress of my report?</h3>
                    <p>You can view the status of your reports on your dashboard under the "Reports" section.</p>
                </li>
                <li>
                    <h3>What should I do if I encounter a technical issue?</h3>
                    <p>If you experience any technical difficulties, please submit an inquiry through this contact form, and our team will assist you.</p>
                </li>
            </ul>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
