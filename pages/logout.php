<?php
    echo 'Logged out.';
    session_unset();
    session_destroy();
    //header("Location: /");
    //die();
?>
