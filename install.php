<!-- (c) ManageMyServer <?php echo date("Y"); ?> -->
<head>
  <link href="/core/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/core/assets/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="/core/assets/js/bootstrap.min.js"></script>
  <title>Install - ManageMyServer</title>
</head>
<body>
    <div class="container">
   <center><h2>Install ManageMyServer</h2></center>
   <!-- Insert installer here Tables: users nodes servers settings -->
        <?php
   if ($_GET["page"] == "") {
   echo "
      <title>Welcome - Install - ManageMyServer</title>
      <h2>Install</h2>
      <p>Welcome to the ManageMyServer installer. Here is where you can intall ManageMyServer on your website. You must have MySQL and PHP for this to work. Thanks for using ManageMyServer.
      <br><br><a href=\"install.php?page=database\" class=\"btn btn-success btn-medium\">Continue</a></p>";
   } elseif ($_GET["page"] == "database") {
   echo "
      <title>Configure Database - Install - ManageMyServer</title>
      <h2>Configure Database</h2>
      <p>
      This will lead you through the database setup.
      <form method=\"post\" action=\"install.php?page=validate\">
      <div class=\"form-group\">
         <label class=\"control-label\" for=\"inputDefault\">Database Address</label>
         <input type=\"text\" name=\"db_address\" class=\"form-control\" id=\"inputDefault\">
      </div>
      <div class=\"form-group\">
         <label class=\"control-label\" for=\"inputDefault\">Database Name</label>
         <input type=\"text\" name=\"db_name\" class=\"form-control\" id=\"inputDefault\">
      </div>
      <div class=\"form-group\">
         <label class=\"control-label\" for=\"inputDefault\">Database Username</label>
         <input type=\"text\" name=\"db_username\" class=\"form-control\" id=\"inputDefault\">
      </div>
      <div class=\"form-group\">
         <label class=\"control-label\" for=\"inputDefault\">Database Password</label>
         <input type=\"password\" name=\"db_password\" class=\"form-control\" id=\"inputDefault\">
      </div>
      <div class=\"form-group\">
         <label class=\"control-label\" for=\"inputDefault\">Table Prefix (If none entered, it will be _ .)</label>
         <input type=\"text\" name=\"db_prefix\" class=\"form-control\" id=\"inputDefault\">
      </div>
      <br><input class=\"btn btn-success btn-medium\" type=\"submit\" name=\"submit\" value=\"Validate &amp; Continue\"></input></p>";
   } elseif ($_GET["page"] == "validate") {

   echo "
      <title>Validate - Install - ManageMyServer</title>
      <h2>Validate Database</h2>
      <p>
      This will validate the information you entered on the previous page.<br><b>";
   /*echo $_GET['db_address'];
   echo $_GET['db_name'];
   echo $_GET['db_username'];
   echo $_GET['db_password'];
   echo $_GET['db_prefix'];*/

   $address = $_POST['db_address'];
   $username = $_POST['db_username'];
   $password = $_POST['db_password'];
   $database = $_POST['db_name'];
   $prefix = $_POST['db_prefix'];

   // Create connection
   $conn = new mysqli($address, $username, $password, $database);

   // Check connection
   if ($conn->connect_error) {
       echo("Connection failed: " . $conn->connect_error. "</b><br><br><a href=\"#\" class=\"btn btn-success btn-medium\" onclick=\"window.history.back()\">Go Back</a>");
   } else {

         echo "Connected successfully to the database.</b><br><br><a href=\"install.php?page=setup_db\" class=\"btn btn-success btn-medium\">Continue</a>";
         file_put_contents('core/config.php', '
<?php
return [
   $db_address = \''.$address.'\';
   $db_name = \''.$database.'\';
   $db_username = \''.$username.'\';
   $db_password = \''.$password.'\';
   $table_prefix = \''.$prefix.'\';
?>
');

   } echo "</p>";
   //End Vertify
   } elseif ($_GET["page"] == "setup_db") {
   echo "
      <title>Setup Database - Install - ManageMyServer</title>
      <h2>Setup Database</h2>
      <p>The installer will now setup the database for use with ManageMyServer.</p>
   ";
   include 'core/config.php';

   //START TABLE SETUP
   // Create connection
   $conn = new mysqli($db_address, $db_username, $db_password, $db_name);
   // Check connection
   if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
   }

   //Create tables
   $sql = 'CREATE TABLE '. $table_prefix .'_prefs (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(30) NOT NULL,
   value VARCHAR(30) NOT NULL
   )';

   if ($conn->query($sql) === TRUE) {
      echo 'Table '. $table_prefix. '_prefs created successfully.';
   } else {
      echo 'Error creating table: ' . $conn->error;
   }echo '<br>';

   $sql = 'CREATE TABLE '. $table_prefix .'_users (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(30) NOT NULL,
   password VARCHAR(30) NOT NULL
   )';

   if ($conn->query($sql) === TRUE) {
      echo 'Table '. $table_prefix. '_users created successfully.';
   } else {
      echo 'Error creating table: ' . $conn->error;
   }echo '<br>';

   //Create Record
   $sql = 'INSERT INTO '. $table_prefix. '_users (username, password)
           VALUES (\'Admin\', \'password\')';

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully.";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }echo '<br>';

   //Create Record
   $sql = 'INSERT INTO '. $table_prefix. '_prefs (name, value)
           VALUES (\'sitename\', \'Example Site\')';

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully.";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }echo '<br>';

   //END SETUP TABLE
   echo '<br><a href="admin.php" class="btn btn-success btn-medium">Continue</a>';

$conn->close();
   } else {
   echo "
      <title>404 - Install - ManageMyServer</title>
      <h2>404 - Uh-oh!</h2>
      <p>Looks like the page you requested isn't at this location!</p>

      <div class=\"btn-group\" role=\"group\" aria-label=\"...\">
         <a href=\"#\" class=\"btn btn-success btn-medium\" onclick=\"window.history.back()\">Back</a>
         <a href=\"/\" class=\"btn btn-primary btn-medium\">Home</a>
      </div>

      ";
   }
        ?>
   <footer><br><hr><p class="pull-right">This installer was made by ManageMyServer.</p><a href="https://github.com/managemyserver/">&copy; ManageMyServer <?php echo date("Y"); ?></a>
  </footer>
  </div>
</body>
