<?php
require_once __DIR__ . '/auth_check.php';
require_once __DIR__ . '/config.php';

$sql = "SELECT h.*, c.name AS customer_name 
        FROM communication_history h 
        LEFT JOIN customers c ON h.customer_id = c.id 
        ORDER BY h.interaction_date DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Communication Logs - Simple CRM</title>
    <link rel="stylesheet" href="style.css?v=1.1">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Communication History</h2>
        <table class="crm-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Interaction Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['interaction_date']; ?></td>
                        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                        <td><strong><?php echo $row['interaction_type']; ?></strong></td>
                        <td><?php echo htmlspecialchars($row['notes']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>