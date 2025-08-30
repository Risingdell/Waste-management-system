<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the uploaded photo
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;

    // Check if the image is valid
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        // It's an image
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // File uploaded successfully
            $photo = $target_file;
        } else {
            $uploadOk = 0;
        }
    } else {
        $uploadOk = 0;
    }

    // Get other form data
    $location = $_POST['location'];
    $category = $_POST['category'];

    if ($uploadOk) {
        // Insert into the database (you would replace this with real database handling code)
        echo "<h1>Success!</h1>";
        echo "<p>Your report has been submitted.</p>";
        echo "<p>Location: $location</p>";
        echo "<p>Category: $category</p>";
        echo "<p>Photo: <img src='$photo' alt='Waste Image' width='300'></p>";
    } else {
        echo "<h1>Error!</h1>";
        echo "<p>There was an issue with your photo upload.</p>";
    }
}
?>
