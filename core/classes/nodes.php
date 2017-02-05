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
        $sql = 'INSERT INTO '.$config['table_prefix'].'_nodes (name, ip, port, ports) VALUES (?, ?, ?, ?)';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $ip, $port, $ports);
        $stmt->execute();
        echo mysqli_stmt_error($stmt);
    }
    function getNodes(){
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes[] = $row[0];
        }
        return $nodes;
    }
    function getOnlineNodes(){
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes WHERE online=?';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$true = true);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes[] = $row[0];
        }
        return $nodes;
    }
    function getNodeStatus($id) {
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes = $row[3];
        }
        return $nodes;
    }
    function getNodeName($id) {
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes = $row[2];
        }
        return $nodes;
    }
    function getNodeIP($id) {
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes = $row[1];
        }
        return $nodes;
    }
    function getNodePort($id) {
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes = $row[4];
        }
        return $nodes;
    }
    function getNodePorts($id){
        $config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');
        $conn = new mysqli($config['db_address'], $config['db_username'], $config['db_password'], $config['db_name']);
        $sql = 'SELECT * FROM '.$config['table_prefix'].'_nodes WHERE id=?';
        $stmt = $conn->stmt_init();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM))
        {
            $nodes[] = $row[5];
        }
        return $nodes;
    }
    function getNodeRAMUsage($id) {
        //TODO Get Ram Usage
        return "--/--";
    }
    function getNodePortsLeft($id) {
        //TODO Get Node's Servers ports
        return "--";
    }
}