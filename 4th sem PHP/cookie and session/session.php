<?php
// Starting the session
session_start();

// Storing data in the session
$_SESSION["user_name"] = "Jane Smith";

// Retrieving and displaying session data
if (isset($_SESSION["user_name"])) {
    echo "Hello, " . $_SESSION["user_name"] . "!";
} else {
    echo "Welcome, guest!";
}
?>
