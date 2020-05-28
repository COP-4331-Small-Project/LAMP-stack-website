<?php
include 'connect_to_db.php';
session_start();

$inData = getRequestInfo();


$searchResults = "";
$searchCount = 0;

$conn = $mysql;
if ($conn->connect_error)
{
    returnWithError( $conn->connect_error );
}
else
{
    $sql = "select firstName from Contacts where firstName like '%" . $inData["search"] . "%' and userId=" . $inData["userId"];
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            if( $searchCount > 0 )
            {
                $searchResults .= ",";
            }
            $searchCount++;
            $searchResults .= '"' . $row["firstName"] . '"';
        }
    }
    else
    {
        returnWithError( "No Records Found" );
    }
    $conn->close();
}

returnWithInfo( $searchResults );

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
