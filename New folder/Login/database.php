<?php

$hostName = "localhost";
$dbUser = "i9645209_wp1";
$dbPassword = "explore4B";
$dbName = "i9645209_wp1";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
?>