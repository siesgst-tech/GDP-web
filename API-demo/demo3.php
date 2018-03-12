<?php
// A sample login API

// the message to return
$message = [];

// database credintials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'test');
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// setting the content type
// header('Content-Type: application/json');

// reject the request if its not a POST request
if($_SERVER["REQUEST_METHOD"] !== "POST")
{
    $message["type"] = "ERROR";
    $message["message"] = "Request type not supported";

    // convert the array to JSON format
    $json = json_encode($message);

    die($json);
}

// convert the received data to associative array
$data = json_decode(file_get_contents('php://input'), true);

// now chech whether the parameter have value or not
if (!empty($data["username"]) && !empty($data["password"]))
{
    // now that all parameters have value, authenticate

    $username = $data["username"];
    $password = $data["password"];

    $sql = "SELECT * FROM login WHERE username = '$username' and password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1)
    {
        // set message
        $message["type"] = "SUCCESS";
        $message["message"] = "LOGIN SUCCESSFUL";
        $message["details"] = $result->fetch_assoc();

        // convert the array to JSON format
        $json = json_encode($message);

        echo $json;
    }
    else
    {
        // set message
        $message["type"] = "ERROR";
        $message["message"] = "AUTH ERROR";

        // convert the array to JSON format
        $json = json_encode($message);

        echo $json;
    }
}
else
{
    // set message
    $message["type"] = "ERROR";
    $message["message"] = "VALUES EMPTY";

    // convert the array to JSON format
    $json = json_encode($message);

    echo $json;
}

?>
