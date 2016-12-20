<!--
    (c) ManageMyServer <?php echo date("Y"); ?>
    MMS Login Page
-->
<?php
if(isset($_POST['Submit'])){ //check if form was submitted
    $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
    $username = $_POST['username']; //get input text
    $password =$_POST['password'];
    $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $sql = 'SELECT * FROM '.$config['table_prefix'].'_users WHERE username=?';
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($sql))
    {
        print "Failed to prepare statement\n";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $hash;
    while ($row = $result->fetch_array(MYSQLI_NUM))
    {
        $hash = $row[2];
    }
    if(password_verify($password, $hash)){
        echo 'Correct password';
        session_start(); and $_SESSION['username'] = $username;
    }

}

?>

<html>

<body>
    <div class="container">
        <div class="col-xs-3"></div>
        <div class="col-xs-6 text-center">
            <form action="" method="post">

                <h2>Login</h2>
                <?php echo $message; ?>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                <div class="btn-group" role="group">
                    <input type="submit" name="Submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
        <div class="col-xs-3"></div>
    </div>

</body>
</html>
<?php


?>
