<?php
// Setting a cookie
setcookie("user_name", "John Doe", time() + 3600); // Expires in 1 hour

// Retrieving and displaying the cookie value
if (isset($_COOKIE["user_name"])) {
    echo "Hello, " . $_COOKIE["user_name"] . "!";
} else {
    echo "Welcome, guest!";
}
?>
