<?php
    header("Location: /login");
    echo session_id();
    print_r($_SESSION);
    echo $_SESSION['username'];
?>
