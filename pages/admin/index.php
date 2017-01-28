<div class="text-center"><h2>Admin Panel</h2></div>
<a href="/admin/users" type="button" class="btn btn-raised ripple-effect btn-primary">Users</a><br>
<a href="/admin/update" type="button" class="btn btn-raised ripple-effect btn-primary">Update</a><br>
<a href="/admin/prefs" type="button" class="btn btn-raised ripple-effect btn-primary">Preferences</a><br>
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
    $results[] = $row;
    $username = $row[0];
    $rank = $row[2];
    $time = $row[6];
    $users[$username] = array($rank, $username, $time);
}
foreach($users as $user){
    if (strtotime($user[2]) > ((time() - 5 * 60))) {
        $online[] = $user;
    }
}
foreach($online as $user){
    echo($user[1]. ' is online.<br>');
}
?>
