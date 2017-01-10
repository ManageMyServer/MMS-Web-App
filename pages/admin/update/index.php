<span class="text-center"><h2>Update ManageMyServer</h2></span>
<?php
    if("pre-0"==(file_get_contents("https://managemyserver.github.io/display/latest_version.html")) {
        echo 'Your version of ManageMyServer is <b>up to date</b>.';
    } else {
        echo file_get_contents("https://managemyserver.github.io/display/update.html");
    }
?>
