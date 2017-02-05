<?php

/**
 * nodes
 *
 * Class used by nodes pages
 *
 * @version 0.0.1
 * @author Joshua
 */
class nodes
{
    function createNode($ip, $name, $port, $ports, $code) {
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
        $sql = 'INSERT INTO '.$config['table_prefix'].'_nodes (name, ip, port, ports) VALUES (?, ?, ?, ?)';
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql))
        {
            print "Failed to prepare statement\n";
        }
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $ip, $port, $ports);
        $stmt->execute();
        echo mysqli_stmt_error($stmt);
    }

}