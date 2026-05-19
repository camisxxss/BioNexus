<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, titulo, tipo, data_url FROM mindmaps");
echo json_encode($stmt->fetchAll());
?>