<?php
// Include the header
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Waste Report</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // JavaScript function to handle real-time feedback for image upload (can be extended for AI validation)
        function validateImage() {
            const image = document.getElementById('photo').files[0];
            const feedback = document.getElementById('image-feedback');

            if (!image) {
                feedback.textContent = 'Please upload an image!';
                feedback.style.color = 'red';
                return false;
            } else {
                feedback.textContent = 'Image looks good!';
                feedback.style.color = 'green';
                return true;
            }
        }

        // Geolocation API for location input
        function getLocation() {
            const locationField = document.getElementById('location');
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    locationField.value = `Lat: ${position.coords.latitude}, Lon: ${position.coords.longitude}`;
                }, function() {
                    locationField.value = 'Geolocation is not supported by your browser.';
                });
            } else {
                locationField.value = 'Geolocation is not supported by your browser.';
            }
        }
    </script>
</head>
<body>
    <main class="report-submission">
        <h1>Submit a New Waste Report</h1>

        <form action="submit_report.php" method="POST" enctype="multipart/form-data" onsubmit="return validateImage()">
            <!-- Photo Upload -->
            <div class="form-group">
                <label for="photo">Upload Waste Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" onchange="validateImage()" required>
                <span id="image-feedback" class="feedback"></span>
            </div>

            <!-- Location Input -->
            <div class="form-group">
                <label for="location">Waste Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter the location" required>
                <button type="button" onclick="getLocation()">Use GPS</button>
            </div>

            <!-- Waste Category -->
            <div class="form-group">
                <label for="category">Waste Category:</label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Plastic">Plastic</option>
                    <option value="Organic">Organic</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Metal">Metal</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Submit Report</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
