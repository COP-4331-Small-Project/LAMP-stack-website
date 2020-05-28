<?php
include 'connect_to_db.php';
session_start();

$inData = getRequestInfo();


$userId = $inData["userId"];
$firstName = $inData["firstName"];
$lastName = $inData["lastName"];
$email = $inData["email"];
$phoneNumber = $inData["phoneNumber"];
$dateCreated = $inData["dateCreated"];


$conn = $mysql;
if ($conn->connect_error)
{
    returnWithError( $conn->connect_error );
}
else
{
    $sql = "insert into Contacts (userId,firstName,lastName,phoneNumber,email,dateCreated) VALUES  (\"'.$userId.'\", \"'.$firstName.'\", \"'.$lastName.'\", \"'.$phoneNumber.'\", \"'.$email.'\", \"'.$dateCreated.'\")";
    if( $result = $conn->query($sql) != TRUE )
    {
        returnWithError( $conn->error );
    }
    $conn->close();
}

returnWithError("");

function getRequestInfo()
{
    return json_decode(file_get_contents('php://input'), true);
}

function sendResultInfoAsJson( $obj )
{
    header('Content-type: application/json');
    echo $obj;
}

function returnWithError( $err )
{
    $retValue = '{"error":"' . $err . '"}';
    sendResultInfoAsJson( $retValue );
}
