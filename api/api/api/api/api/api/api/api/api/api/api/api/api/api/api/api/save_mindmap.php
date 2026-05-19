<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->prepare("REPLACE INTO mindmaps (id, titulo, tipo, data_url) VALUES (?, ?, ?, ?)");
$stmt->execute([
    $data['id'],
    $data['titulo'],
    $data['tipo'] ?? 'imagem',
    $data['data_url']
]);

echo json_encode(['success' => true]);
?>