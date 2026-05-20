<?php
require_once 'config.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare("DELETE FROM quizzes WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(['success' => true]);
?>