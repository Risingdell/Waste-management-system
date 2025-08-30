<?php
session_start(); // Assuming admin login is tracked via session

// Include the header
include 'header.php';

// Placeholder data for waste reports (normally this data would come from a database)
$waste_reports = [
    ["id" => 1, "image" => "waste1.jpg", "ai_category" => "Plastic", "manual_category" => ""],
    ["id" => 2, "image" => "waste2.jpg", "ai_category" => "Organic", "manual_category" => ""],
    ["id" => 3, "image" => "waste3.jpg", "ai_category" => "Metal", "manual_category" => "Glass"], // Manual override example
];

// Handle manual categorization submission (simplified for demo purposes)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_id = $_POST['report_id'];
    $manual_category = $_POST['manual_category'];

    // Here, you would update the database with the manual category
    foreach ($waste_reports as &$report) {
        if ($report['id'] == $report_id) {
            $report['manual_category'] = $manual_category;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Categorization - Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="categorization-page">
        <h1>Waste Categorization - Admin</h1>

        <section class="waste-reports">
            <h2>Pending Waste Reports</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>AI Suggested Category</th>
                        <th>Manual Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($waste_reports as $report): ?>
                        <tr>
                            <td><img src="images/<?php echo $report['image']; ?>" alt="Waste Image" width="100"></td>
                            <td><?php echo $report['ai_category']; ?></td>
                            <td>
                                <?php echo $report['manual_category'] ?: 'Not Categorized'; ?>
                            </td>
                            <td>
                                <form action="waste_categorization.php" method="post">
                                    <input type="hidden" name="report_id" value="<?php echo $report['id']; ?>">
                                    <select name="manual_category">
                                        <option value="Plastic" <?php echo $report['manual_category'] === 'Plastic' ? 'selected' : ''; ?>>Plastic</option>
                                        <option value="Organic" <?php echo $report['manual_category'] === 'Organic' ? 'selected' : ''; ?>>Organic</option>
                                        <option value="Metal" <?php echo $report['manual_category'] === 'Metal' ? 'selected' : ''; ?>>Metal</option>
                                        <option value="Glass" <?php echo $report['manual_category'] === 'Glass' ? 'selected' : ''; ?>>Glass</option>
                                        <option value="Other" <?php echo $report['manual_category'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                    <button type="submit">Update Category</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
