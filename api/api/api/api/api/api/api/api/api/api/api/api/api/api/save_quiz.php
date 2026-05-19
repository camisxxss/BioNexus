<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->prepare("REPLACE INTO quizzes (id, serie, text, options, correct, difficulty, explanation) VALUES (?, ?, ?, ?, ?, ?, ?)");
$optionsJson = json_encode($data['options']);
$stmt->execute([
    $data['id'],
    $data['serie'],
    $data['text'],
    $optionsJson,
    $data['correct'],
    $data['difficulty'],
    $data['explanation']
]);

echo json_encode(['success' => true]);
?>