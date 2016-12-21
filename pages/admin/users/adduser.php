<!--
    (c) ManageMyServer <?php echo date("Y"); ?>
    MMS Create User Page
-->
<div class="text-center">
    <?php
    if(isset($_POST['Submit'])){ //check if form was submitted
        echo $_SESSION;
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $username = $_POST['username']; //get input text
        $password =$_POST['password'];
        $rank = $_POST['rank'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $sql = 'INSERT INTO '.$config['table_prefix'].'_users (username, password, rank) VALUES (?, ?, ?)';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql))
        {
            print "Failed to prepare statement\n";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hash, $rank);
        $stmt->execute();
        echo mysqli_stmt_error($stmt);
        header("Location: /admin/users");
        die();
       }
    ?>
</div>
<html>

<body>
    <div class="container">
        <div class="col-xs-3"></div>
        <div class="col-xs-6 text-center">
            <div class="form-group">
                <form action="" method="post">

                    <h2>Create User</h2>
                    <?php echo $message; ?>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Select Account Type</label>
                        <select name="rank" class="form-control" id="exampleSelect1" size=1>
                            <option disabled>Superuser</option>
                            <option>Admin</option>
                            <option selected>User</option>
                        </select>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="submit" name="Submit" class="btn btn-primary" />
                    </div>
                    <br><br><a href="#" onclick="window.history.back()">Back to Users</a>
                </form>
            </div>
        </div>
        <div class="col-xs-3"></div>
    </div>

</body>
</html>
<?php


?>
