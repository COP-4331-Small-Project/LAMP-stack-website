<?php

session_start();

if (!$_SESSION['valid']) {
    http_response_code(401);
    echo 'Not logged in';
    exit;
}

include '../connect_to_db.php';

$inData = getRequestInfo();

$id = $mysql->real_escape_string($inData["id"]);

if (!$id) {
    http_response_code(400);
    echo 'missing id';
    exit;
}

$sql = "DELETE FROM `Contacts` WHERE `id` = '$id' AND userId";

if ($result = $mysql->query($sql) !== TRUE)
{
    http_response_code(404);
    echo 'Contact not found';
} else {
    echo 'Contact successfully deleted';
}

$mysql->close();

function getRequestInfo()
{
    return json_decode(file_get_contents('php://input'), true);
}
