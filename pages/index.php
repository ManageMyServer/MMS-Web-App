<?php
    echo 'Hello '.$_SESSION['username'];
?>
, welcome to ManageMyServer.
<?php if(strtolower($_SESSION['rank']) == strtolower('superuser') | strtolower($_SESSION['rank']) == strtolower('Admin')) {
    echo '<hr>';
    echo file_get_contents('https://managemyserver.github.io/app/display.html');
}?>
