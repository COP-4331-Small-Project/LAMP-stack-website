<?php

session_start();

if (!$_SESSION['valid']) {
    http_response_code(401);
    echo 'Not logged in';
    exit;
}

include_once '../connect_to_db.php';

$userId = $_SESSION["userId"];
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$search = $mysql->real_escape_string($queries["search"]);

$sql = "select * from Contacts where (firstName like '%$search%' OR lastName like '%$search%' OR email like '%$search%'"
. " OR phoneNumber like '%$search%')"
. "and userId='$userId';";
$result = $mysql->query($sql);
$retJson = json_encode($result->fetch_all(MYSQLI_ASSOC));
header('Content-Type: application/json');
echo $retJson;

$mysql->close();