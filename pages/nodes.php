<?php require_once($_SERVER['DOCUMENT_ROOT']."/core/classes/nodes.php"); $node = new nodes();?>
<span class="text-center"><h2>Nodes</h2></span>
<a href="/nodes/addnode" class="btn btn-sm btn-primary">Add Node</a>
<table class="table">
    <thead>
        <tr>
            <th>Node Name</th>
            <th>RAM Usage</th>
            <th>IP</th>
            <th>Ports Left</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nodes = $node->getNodes();
            foreach($nodes as $nodeid) {
                echo'<tr><td>'.$node->getNodeName($nodeid).'</td>';
                echo'<td>'.$node->getNodeRAMUsage($nodeid).'</td>';
                echo'<td>'.$node->getNodeIP($nodeid).'</td>';
                echo'<td>'.$node->getNodePortsLeft($nodeid).'</td>';
                $status = $node->getNodeStatus($nodeid);
                if($status) {
                    echo'<td><span class="label label-success">Online</span></td></tr>';
                } else {
                    echo'<td><span class="label label-danger">Offline</span></td></tr>';
                }

            }
        ?>
    </tbody>
</table>
