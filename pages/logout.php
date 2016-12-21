<?php
    echo 'Logging out...';
    session_unset();
    session_destroy();
    header("Location: /");
    die();
?>
