<?php

session_start();

include 'connect_to_db.php';

if (!$mysql) {
    die("Failed db connection");
}

// Allows POST body to be decoded into PHP object
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

// If we have something in the body
if (!empty($_POST)) {
    // All fields are escaped to prevent SQL injection
    $username = empty($_POST['username']) ? null : $mysql->real_escape_string($_POST['username']);
    $password = empty($_POST['password']) ? null : $_POST['password'];

    // Grab user's password hash
    $res = $mysql->query("SELECT * FROM `Users` WHERE username = '$username';");
    // Check password against db entry
    if (($row = $res->fetch_assoc()) && hash('sha256', $password) === $row['password']) {
        // Set session to valid. Store username and user ID
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $row['email'];
        $_SESSION['userId'] = $row["id"];

        $userObj['username'] = $row['username'];
        $userObj['email'] = $row['email'];
        echo json_encode($userObj);
    } else {
        // Login failed. Determine error case
        if ($username === null || $password === null) {
            http_response_code(400);
            echo 'Missing username/password';
        } else {
            http_response_code(401);
            echo 'Invalid username/password';
        }
    }
} else {
    // Otherwise, the user is checking if they are logged in
    if ($_SESSION['valid'] === true) {
        $userObj['username'] = $_SESSION['username'];
        $userObj['email'] = $_SESSION['email'];
        echo json_encode($userObj);
    } else {
        http_response_code(401);
        echo 'invalid session';
    }
}