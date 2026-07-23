<?php
/*
    index.php  -->  LOGIN PAGE
    ---------------------------
    This is the first page the user sees.
    It checks the username & password against the "users" table.
*/
require_once __DIR__ . '/config.php';

// If the user is ALREADY logged in, skip the login screen entirely
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";
$success_message = "";

// Check if the user just logged out successfully
if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
    $success_message = "Logged out successfully. See you soon! 👋";
}

// If a login form was submitted...
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form values safely
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Look up the user by username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Check the password against the hashed password in DB
        if (password_verify($password, $user['password'])) {
            // Correct login -> save data in session
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "No account found with that username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Simple CRM</title>
    <link rel="stylesheet" href="style.css?v=1.1">
</head>
<body>

    <div class="auth-box">
        <h2>CRM Login</h2>

        <?php if ($success_message != "") { ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success_message); ?></div>
        <?php } ?>

        <?php if ($error != "") { ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>

        <form method="POST" action="index.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required autocomplete="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn" style="width:100%;">Login</button>
        </form>

        <p class="auth-footer">Don't have an account? <a href="register.php">Register here</a></p>
    </div>

<?php include 'footer.php'; ?>
</body>
</html>


