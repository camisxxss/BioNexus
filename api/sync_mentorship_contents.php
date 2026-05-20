<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$pdo->beginTransaction();
try {
    $pdo->exec("TRUNCATE TABLE mentorship_contents");
    
    $stmt = $pdo->prepare("INSERT INTO mentorship_contents (id, serie, titulo, descricao, texto) VALUES (?, ?, ?, ?, ?)");
    foreach ($data as $item) {
        $stmt->execute([
            $item['id'],
            $item['serie'],
            $item['titulo'],
            $item['descricao'] ?? $item['desc'] ?? '',
            $item['texto']
        ]);
    }
    
    $pdo->commit();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['error' => $e->getMessage()]);
}
?>