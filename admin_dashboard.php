<?php
session_start(); // Admin session management

// Sample data for the dashboard (in a real scenario, you'd fetch this from a database)
$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'reports' => 10, 'status' => 'Active'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'reports' => 5, 'status' => 'Active'],
];

$reports = [
    ['id' => 101, 'user' => 'John Doe', 'category' => 'Plastic', 'status' => 'Pending'],
    ['id' => 102, 'user' => 'Jane Smith', 'category' => 'Metal', 'status' => 'Collected'],
];

// Sample waste collection data
$collection_stats = [
    'total_collections' => 50,
    'pending_collections' => 5,
    'completed_collections' => 45,
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="admin-dashboard">
        <h1>Admin Dashboard</h1>

        <!-- User Management Section -->
        <section class="user-management">
            <h2>User Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Reports Submitted</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['reports']; ?></td>
                        <td><?php echo $user['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Report Management Section -->
        <section class="report-management">
            <h2>Report Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Report ID</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?php echo $report['id']; ?></td>
                        <td><?php echo $report['user']; ?></td>
                        <td><?php echo $report['category']; ?></td>
                        <td><?php echo $report['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <!-- Waste Collection Data Section -->
        <section class="waste-collection-data">
            <h2>Waste Collection Data</h2>
            <ul>
                <li>Total Collections: <?php echo $collection_stats['total_collections']; ?></li>
                <li>Pending Collections: <?php echo $collection_stats['pending_collections']; ?></li>
                <li>Completed Collections: <?php echo $collection_stats['completed_collections']; ?></li>
            </ul>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
