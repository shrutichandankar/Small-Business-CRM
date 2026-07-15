<?php
/*
    logout.php
    ----------
    Destroys the session and sends the user back to the login page.
*/
//require_once 'config.php';
require_once __DIR__ . '/config.php';

session_unset();      // remove all session variables
session_destroy();    // destroy the session

header("Location: index.php?Logout=success");
exit();
?>
