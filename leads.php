<?php
/*
    leads.php  -->  LIST ALL LEADS
    ---------------------------------
    Joins "leads" with "customers" so we can show the customer name
    next to each lead.
*/
require_once __DIR__ . '/config.php';
require_once 'auth_check.php';

$sql = "SELECT leads.*, customers.name AS customer_name
        FROM leads
        JOIN customers ON leads.customer_id = customers.id
        ORDER BY leads.created_at DESC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leads - CRM</title>
    <link rel="stylesheet" href="style.css?v=2.1">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Leads</h2>

        <div class="top-actions">
            <a href="add_lead.php" class="btn">+ Add New Lead</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { 
                    $lead_status_class = strtolower(str_replace(' ', '-', $row['status']));
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['title']); ?></td>
                        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                        <td>
                            <span class="badge status-<?php echo $lead_status_class; ?>">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>