<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$stmt = $pdo->prepare("INSERT INTO quiz_results (student_name, serie, curso, assunto, acertos, erros, nota, data, tipo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $data['nome'],
    $data['serie'],
    $data['curso'],
    $data['assunto'],
    $data['acertos'],
    $data['erros'],
    $data['nota'],
    date('Y-m-d H:i:s'),
    $data['tipo']
]);
echo json_encode(['success' => true]);
?>