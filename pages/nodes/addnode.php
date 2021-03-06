<?php
require_once($_SERVER['DOCUMENT_ROOT']."/core/classes/nodes.php");
$node = new nodes();
if(isset($_POST['Submit'])){
    $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
    $name = $_POST['name']; //get input text
    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $ports = $_POST['ports'];
    $code = $_POST['code'];
    $node->createNode($ip, $name, $port, $ports, $code);

}
?>
<div class="col-xs-offset-3 col-xs-6 text-center">
<h2>Add Node</h2>
<p>
Confused? Click the link to see how to add a node: <a href="https://managemyserver.github.io/docs/addnode.html">Instructions on how to add node.</a><br>
</p>
    <form action="" method="post">
        <div class="form-group">
            <label class="control-label">Name the node</label>
            <input name="name" type="text" class="form-control" placeholder="US-Node1" required />
        </div>
        <div class="form-group">
            <label class="control-label">Public IP of the node</label>
            <input name="ip" type="text" class="form-control" placeholder="12.34.567.89" required />
        </div>
        <div class="form-group">
            <label class="control-label">Type the port the software is running on.</label>
            <input name="port" type="text" class="form-control" placeholder="7473" required />
        </div>
        <div class="form-group">
            <label class="control-label">Type the code displayed when the application is launched.</label>
            <input name="code" type="text" class="form-control" placeholder="hr7g3x2" required />
        </div>
        <div class="form-group">
            <label class="control-label">Type the availible ports separated by commas. (No spaces!)</label>
            <input name="ports" type="text" class="form-control" placeholder="25565,25626,26738" required />
        </div>
        <div class="btn-group" role="group">
            <input type="submit" name="Submit" value="Add Node"class="btn btn-primary" />
        </div>
    </form>
</div>
<div class="col-xs-5"></div>
