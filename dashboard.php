<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth_check.php';

$customerCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM customers"))['total'];
$leadCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM leads"))['total'];
$wonCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM leads WHERE status='Won'"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Simple CRM</title>
    <link rel="stylesheet" href="style.css?v=1.1">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>

        <div class="cards">
            <div class="card">
                <h3><?php echo $customerCount; ?></h3>
                <p>Total Customers</p>
            </div>
            <div class="card orange">
                <h3><?php echo $leadCount; ?></h3>
                <p>Total Leads</p>
            </div>
            <div class="card green">
                <h3><?php echo $wonCount; ?></h3>
                <p>Leads Won</p>
            </div>
        </div>

        <p>Use the navigation bar above to manage <strong>Customers</strong> and <strong>Leads</strong>.</p>
    </div>

<?php include 'footer.php'; ?>
</body>
</html>
