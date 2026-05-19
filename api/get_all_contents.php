<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, serie, titulo, descricao, texto FROM contents");
echo json_encode($stmt->fetchAll());
?>