<span class="text-center"><h2>Update ManageMyServer</h2></span>
<?php
    $current_version = "dev-0";
    $data_file = file_get_contents("https://managemyserver.github.io/display/data.html");
    $object = json_decode($data_file);
    $version = $object->version;
    echo 'Current Version: ' . $current_version;
    echo '<br>Latest Version: ' . $version;
    echo '<br><br>';
    if($current_version == $version) {
        echo 'Your version of ManageMyServer is up to date.';
    } else {
        echo file_get_contents("https://managemyserver.github.io/display/update.html");
    }
?>
