<?php
require_once 'config.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare("DELETE FROM contents WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(['success' => true]);
?>