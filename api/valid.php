<?php
session_start();

if ($_SESSION['valid'] === true) {
    echo 'Your name is ' . $_SESSION['username'];
} else {
    http_response_code(401);
    echo 'You do not have a valid session';
}