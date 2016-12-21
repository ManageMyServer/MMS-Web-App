<?php
$id = $_GET['id'];
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
if(isset($_POST['Delete'])){
    $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $sql = 'DELETE FROM '.$config['table_prefix'].'_users WHERE id=?';
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($sql))
    {
        print "Failed to prepare statement\n";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$_GET['id']);
    $stmt->execute();
    if(empty(mysqli_stmt_error($stmt))){
        header("Location: /admin/users");
    }
    echo mysqli_stmt_error($stmt);
}
if(isset($_POST['Submit'])){
    if($_POST['username'] == $username && $_POST['password'] == ''){
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $rank = $_POST['rank'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $sql = 'UPDATE '.$config['table_prefix'].'_users SET rank=? WHERE id=?';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql))
        {
            print "Failed to prepare statement\n";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $rank, $id);
        $stmt->execute();
        if(empty(mysqli_stmt_error($stmt))){
            header("Refresh:0");
        }
        echo mysqli_stmt_error($stmt);
    } elseif($_POST['username'] == $username){
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $password = $_POST['password'];
        $rank = $_POST['rank'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $sql = 'UPDATE '.$config['table_prefix'].'_users SET password=?, rank=? WHERE id=?';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql))
        {
            print "Failed to prepare statement\n";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $hash, $rank, $id);
        $stmt->execute();
        if(empty(mysqli_stmt_error($stmt))){
            header("Refresh:0");
        }
        echo mysqli_stmt_error($stmt);
    } elseif ($_POST['password'] == ''){
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $username = $_POST['username'];
        $rank = $_POST['rank'];
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $sql = 'UPDATE '.$config['table_prefix'].'_users SET username=?, rank=? WHERE id=?';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql))
        {
            print "Failed to prepare statement\n";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $username, $rank, $id);
        $stmt->execute();
        if(empty(mysqli_stmt_error($stmt))){
            header("Refresh:0");
        }
        echo mysqli_stmt_error($stmt);
    } else {
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rank = $_POST['rank'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $sql = 'UPDATE '.$config['table_prefix'].'_users SET username=?, password=?, rank=? WHERE id=?';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql))
        {
            print "Failed to prepare statement\n";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $password, $rank, $id);
        $stmt->execute();
        if(empty(mysqli_stmt_error($stmt))){
            header("Refresh:0");
        }
        echo mysqli_stmt_error($stmt);

    }
}
?>
<div class="container">
    <div class="col-xs-2"></div>
    <div class="col-xs-8 ">
        <div class="text-center">
            <h2>User: <?php echo $results['0']['0']?></h2>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="form-control" value="<?php echo $results['0']['0'];?>" />
            </div>
            <div class="form-group">
                <label for="password">Change Password (leave blank if you don't want to change it)</label>
                <input id="password" type="password" name="password" class="form-control"/>
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
        <?php if($results['0']['3'] != 1){echo '
        <button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#myModal">
            Delete user
        </button>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button style="float: left" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <form action="" method="post">
                            <input type="submit" name="Delete" class="btn btn-primary" value="Delete" />
                        </form>
                    </div>
                </div>
            </div>
        </div>';}?>
    </div>
    <div class="col-xs-2"></div>
</div>
