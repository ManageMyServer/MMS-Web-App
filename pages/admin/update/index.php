<span class="text-center"><h2>Update ManageMyServer <small>Work in Progress</small></h2></span>
<?php
    $local_version = "0";
    $version = file_get_contents("https://managemyserver.github.io/display/latest_version.html");
    echo 'Local Version: ' . $local_version;
    echo '<br>Latest Version: ' . $version;
    echo '<br><br>';
    if(($local_version)==($version)) {
        echo 'Your version of ManageMyServer is up to date.';
    } else {
        echo file_get_contents("https://managemyserver.github.io/display/update.html");
    }
?>
