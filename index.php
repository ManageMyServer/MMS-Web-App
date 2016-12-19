
<?php
include 'pages/includes/header.php';

$page = '/pages/' . $_GET["page"] . '.php';
include($_SERVER['DOCUMENT_ROOT'] . $page);
?>


<?php
include 'pages/includes/footer.php';
?>