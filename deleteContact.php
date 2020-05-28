<?php
include 'connect_to_db.php';
session_start();

$inData = getRequestInfo();

$id = $inData["id"];

$conn = $sql;
if ($conn->connect_error)
{
    returnWithError( $conn->connect_error );
}
else
    {
    $sql = "DELETE FROM `Contacts` WHERE `id` = '" . $id . "'";

    if ($result = $conn->query($sql) != TRUE)
    {
        returnWithError($conn->error);
    }

        $conn->close();
    }

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
    $retValue = '{"id":0,"firstName":"","lastName":"","error":"' . $err . '"}';
    sendResultInfoAsJson( $retValue );
}

function returnWithInfo( $searchResults )
{
    $retValue = '{"results":[' . $searchResults . '],"error":""}';
    sendResultInfoAsJson($retValue);
}
