<?php
    echo 'Hello '.$_SESSION['username'];
?>
, welcome to ManageMyServer.<hr>
<?php echo file_get_contents('https://managemyserver.github.io/display.html'); ?>
