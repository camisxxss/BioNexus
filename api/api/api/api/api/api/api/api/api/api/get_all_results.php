<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT * FROM quiz_results ORDER BY data DESC");
echo json_encode($stmt->fetchAll());
?>