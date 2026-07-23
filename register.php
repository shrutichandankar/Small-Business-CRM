<?php
/*
    register.php  -->  REGISTRATION PAGE
    -------------------------------------
    Creates a new row in the "users" table.
    Password is hashed before saving (never store plain text passwords!).
*/
// require_once 'config.php';
// $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
require_once __DIR__ . '/config.php';
$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Check if username or email already exists
    $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username' OR email='$email'");

    if (mysqli_num_rows($check) > 0) {
        $error = "Username or email already registered.";
    } else {
        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            $success = "Account created successfully! You can login now.";
        } else {
            $error = "Something went wrong: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Simple CRM</title>
    <link rel="stylesheet" href="style.css?v=1.1">
</head>
<body>

    <div class="auth-box">
        <h2>Create Account</h2>

        <?php if ($error != "") { ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if ($success != "") { ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php } ?>

        <form method="POST" action="register.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn" style="width:100%;">Register</button>
        </form>

        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>

<?php include 'footer.php'; ?>
</body>
</html>