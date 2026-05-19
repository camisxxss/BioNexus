<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$pdo->beginTransaction();
try {
    $pdo->exec("TRUNCATE TABLE slides");
    
    $stmt = $pdo->prepare("INSERT INTO slides (id, titulo, tipo, data_url) VALUES (?, ?, ?, ?)");
    foreach ($data as $item) {
        $stmt->execute([
            $item['id'],
            $item['titulo'],
            $item['tipo'],
            $item['data_url']
        ]);
    }
    
    $pdo->commit();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['error' => $e->getMessage()]);
}
?>