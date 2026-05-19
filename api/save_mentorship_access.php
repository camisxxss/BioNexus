<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$stmt = $pdo->prepare("INSERT INTO mentorship_access (nome, serie, curso, data) VALUES (?, ?, ?, ?)");
$stmt->execute([
    $data['nome'],
    $data['serie'],
    $data['curso'],
    date('Y-m-d H:i:s')
]);
echo json_encode(['success' => true]);
?>