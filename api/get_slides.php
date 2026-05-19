<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, titulo, tipo, data_url FROM slides");
echo json_encode($stmt->fetchAll());
?>