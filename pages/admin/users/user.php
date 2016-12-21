<?php
$conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = 'SELECT * FROM '.$config['table_prefix'].'_users WHERE id=? ORDER BY id';
$stmt = $conn->stmt_init();
if(!$stmt->prepare($sql))
{
    print "Failed to prepare statement\n";
}
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$users = array();
while ($row = $result->fetch_array(MYSQLI_NUM))
{
    $results[] = $row;
    $username = $row[0];
    $rank = $row[2];
    $root = $row[3];
    $users[$username] = array($rank, $root);
}
if(sizeof($users) == 0){
    echo '<div class="text-center">No users with that ID were found.</div>';
} elseif(1==2) { // Changed to hide table -> originally } else {
    echo'<div class="container">
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>';
    foreach($results as $user) {
        echo'<tr><td>'.$user[4].'<td><a href="/admin/users/user/?id='.$user[4].'">'.$user[0].'</td><td>'.$user[2].'</td></tr>';
    }
    echo'</tbody>
        </table>
        </div>
    </div>';
}
?>
<div class="container">
    <div class="col-xs-2"></div>
    <div class="col-xs-8 ">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">User type</label>
                <input id="username" type="text" name="username" class="form-control" value="<?php echo $results['0']['0'];?>" />
            </div>
            <div class="form-group">
                <label for="exampleSelect1">User type</label>
                <select name="rank" class="form-control" id="exampleSelect1" size=1>
                    <option>Superuser</option>
                    <option>Admin</option>
                    <option>User</option>
                </select>
            </div>
            <div class="text-center">
                <div class="btn-group text-center" role="group">
                    <input type="submit" name="Submit" class="btn btn-primary" />
                </div>
            </div>

        </form>
    </div>
    <div class="col-xs-2"></div>
</div>
