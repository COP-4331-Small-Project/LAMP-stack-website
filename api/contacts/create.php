<?php

session_start();

if (!$_SESSION['valid']) {
    http_response_code(401);
    echo 'Not logged in';
    exit;
}

include_once '../connect_to_db.php';

$inData = getRequestInfo();

$userId = $_SESSION['userId'];
$firstName = $mysql->real_escape_string($inData["firstName"]);
$lastName = $mysql->real_escape_string($inData["lastName"]);
$email = $mysql->real_escape_string($inData["email"]);
$phoneNumber = $mysql->real_escape_string($inData["phoneNumber"]);
$house = $mysql->real_escape_string($inData["house"]);

if (!$firstName || !$lastName || !$email || !$phoneNumber) {
    http_response_code(400);
    echo 'missing contact details';
    exit;
}

$sql = "insert into Contacts (userId,firstName,lastName,phoneNumber,email,house)"
. "VALUES ($userId, $firstName, $lastName, $phoneNumber, $email, $house)";
echo "$sql\n";
if($result = $mysql->query($sql) !== TRUE )
{
    http_response_code(500);
    echo 'unknown error occurred: ';
} else {
    echo 'contact created';
}
$mysql->close();

function getRequestInfo()
{
    return json_decode(file_get_contents('php://input'), true);
}