<?php
$conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = 'SELECT * FROM '.$config['table_prefix'].'_users';
$stmt = $conn->stmt_init();
if(!$stmt->prepare($sql))
{
    print "Failed to prepare statement\n";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$users = array();
while ($row = $result->fetch_array(MYSQLI_NUM))
{

    $username = $row[1];
    $rank = $row[3];
    $root = $row[4];
    $users[$username] = array($rank, $root);
}
print_r($users);
?>