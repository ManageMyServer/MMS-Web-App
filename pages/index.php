<?php
    echo 'Hello '.$_SESSION['username'];
?>
, welcome to ManageMyServer.<hr>
<?php if(strtolower($_SESSION['rank']) == strtolower('superuser') | strtolower($_SESSION['rank']) == strtolower('Admin')) {
          echo file_get_contents('https://managemyserver.github.io/display/');
}?>
