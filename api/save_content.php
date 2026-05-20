<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->prepare("REPLACE INTO contents (id, serie, titulo, descricao, texto) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([
    $data['id'],
    $data['serie'],
    $data['titulo'],
    $data['descricao'] ?? $data['desc'] ?? '',
    $data['texto']
]);

echo json_encode(['success' => true]);
?>