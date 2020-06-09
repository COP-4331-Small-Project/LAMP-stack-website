<?php

session_start();

if(!$_SESSION["valid"]) {
    header("Location: ../index.html");
    exit;
}

include_once '../connect_to_db.php';

$inData = getRequestInfo();

$id = $mysql->real_escape_string($inData["id"]);
$userId = $_SESSION["userId"];

if (!$id) {
    http_response_code(400);
    echo 'missing id';
    exit;
}

$sql = "SELECT * FROM Contacts WHERE id='$id' AND userId='$userId';";

if ($result = $mysql->query($sql))
{
    header('Content-Type: application/json');
    echo json_encode($result->fetch_assoc());
} else {
    http_response_code(404);
    echo 'Contact not found';
}

$mysql->close();

function getRequestInfo()
{
    return json_decode(file_get_contents('php://input'), true);
}
