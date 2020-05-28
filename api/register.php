<?php

include 'connect_to_db.php';

if (!$mysql) {
    die("Failed db connection");
}

// Allows POST body to be decoded into PHP object
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if (!empty($_POST)) {
    // All fields are escaped to prevent SQL injection
    $username = empty($_POST['username']) ? null : $mysql->real_escape_string($_POST['username']);
    // Password is hashed so it can be safely stored
    $password = empty($_POST['password']) ? null : $mysql->real_escape_string(hash('sha256', $_POST['password']));
    $email = empty($_POST['email']) ? null : $mysql->real_escape_string($_POST['email']);

    if ($username === null || $password === null || $email === null) {
        http_response_code(400);
        echo 'missing fields';
        exit();
    }

    $res = $mysql->query("SELECT * FROM `Users` WHERE username = '$username';");
    if ($res->num_rows != 0) {
        http_response_code(403);
        echo 'username already exists';
    } else {
        // Save user
        if ($res = $mysql->query("INSERT INTO `Users` (username, password, email) VALUES ('$username', '$password', '$email');")) {
            // Create session cookie
            session_start();
            $_SESSION['valid'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $res->fetch_assoc()["id"];
            echo 'user created';
        } else {
            http_response_code(500);
            echo 'unknown error occurred';
        }
    }
}