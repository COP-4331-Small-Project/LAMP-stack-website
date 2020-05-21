<?php
session_start();

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

// If we have something in the body
if (!empty($_POST)) {
    $username = empty($_POST['username']) ? null : $_POST['username'];
    $password = empty($_POST['password']) ? null : $_POST['password'];
    // Check validity of user (will eventually be against DB)
    if ($username === 'test' && $password === hash('sha256', 'password')) {
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $username;
        echo 'Logged in';
    } else {
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
        echo 'Logged in';
    } else {
        http_response_code(401);
        echo 'invalid session';
    }
}