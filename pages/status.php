<?php require_once($_SERVER['DOCUMENT_ROOT']."/core/classes/nodes.php"); $node = new nodes();?>
<span class="text-center"><h2>Status</h2></span>
<table class="table">
    <thead>
        <tr>
            <th>Node Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nodes = $node->getNodes();
            foreach($nodes as $nodeid) {
                echo'<tr><td>'.$node->getNodeName($nodeid).'</td>';
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
