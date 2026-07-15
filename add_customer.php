<?php
/*
    add_customer.php  -->  ADD NEW CUSTOMER
    ------------------------------------------
    Shows a form, and on submit, inserts a new row into "customers".
*/
//require_once 'config.php';
require_once __DIR__ . '/config.php';
require_once 'auth_check.php';

$error = "";

//$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    if ($name == "") {
        $error = "Name is required.";
    } else {
        $sql = "INSERT INTO customers (name, email, phone, company, address)
                VALUES ('$name', '$email', '$phone', '$company', '$address')";

        if (mysqli_query($conn, $sql)) {
            header("Location: customers.php");
            exit();
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer - Simple CRM</title>
    <link rel="stylesheet" href="style.css?v=1.1">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>Add New Customer</h2>

        <?php if ($error != "") { ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST" action="add_customer.php">
            <div class="form-group">
                <label>Full Name *</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone">
            </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" rows="3"></textarea>
            </div>

            <button type="submit" class="btn">Save Customer</button>
            <a href="customers.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>

</body>
</html>
