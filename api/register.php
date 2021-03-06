<?php
session_start();
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
    $house = empty($_POST['house']) ? null : $mysql->real_escape_string($_POST['house']);

    if ($username === null || $password === null || $email === null || $house === null) {
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
        if ($res = $mysql->query("INSERT INTO `Users` (username, password, email, house) VALUES ('$username', '$password', '$email', '$house');")) {
            // Create session cookie
            $row = $mysql->query("SELECT * FROM Users WHERE username='$username';")->fetch_assoc();
            session_start();
            $_SESSION['valid'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $row["id"];
            $_SESSION['email'] = $row["email"];

            $userObj['username'] = $_SESSION['username'];
            $userObj['email'] = $_SESSION['email'];
            $userObj['house'] = $row["house"];
            echo json_encode($userObj);
        } else {
            http_response_code(500);
            echo 'unknown error occurred';
        }
    }
} else {
    http_response_code(400);
    echo 'missing fields';
}