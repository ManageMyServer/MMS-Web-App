<?php
    header("Location: /login.php");
    echo session_id();
    print_r($_SESSION);
    echo $_SESSION['username'];
?>
