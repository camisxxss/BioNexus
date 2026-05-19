<?php
require_once 'config.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare("DELETE FROM mindmaps WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(['success' => true]);
?>