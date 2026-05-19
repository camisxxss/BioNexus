<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$code = $data['code'];

if ($code !== 'MLXFBIOLOGIACVE') {
    echo json_encode(['error' => 'Código inválido']);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO students (name, progress_xp, progress_level) VALUES (?, 0, 1)");
$stmt->execute([$name]);

echo json_encode(['success' => true]);
?>