<?php
// A sample login API

// database credintials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'test');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($_SERVER["REQUEST_METHOD"] !== "POST")
    die("ERROR! Request type not supported");

// now chech whether the parameter have value or not
if (!empty($_POST["username"]) && !empty($_POST["password"]))
{
    // now that all parameters have value, authenticate

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1)
        echo "LOGIN SUCCESSFUL";
    else
        echo "LOGIN FAILED";
}
else
{
    // if any of the parameter is empty, through an error
    echo "ERROR! Some of the values are empty";
}

?>
