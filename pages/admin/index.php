<div class="text-center"><h2>Admin Panel</h2></div>
<a href="/admin/users">Users</a><br />

<?php
$number_of_users = count(scandir(ini_get("session.save_path")));
echo $number_of_users;
?>
