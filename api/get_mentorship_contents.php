<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, serie, titulo, descricao, texto FROM mentorship_contents");
echo json_encode($stmt->fetchAll());
?>