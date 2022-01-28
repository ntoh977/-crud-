<?php
require_once "config.php";
$id = $_GET['id'];

$sql = 'DELETE FROM users WHERE id = :id';
 $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
 
        $stmt->execute();
        header( "Refresh:0.5; url='admin.php'");