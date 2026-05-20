<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$pdo->beginTransaction();
try {
    $pdo->exec("TRUNCATE TABLE classrooms");
    
    $stmt = $pdo->prepare("INSERT INTO classrooms (id, name, password, materials) VALUES (?, ?, ?, ?)");
    foreach ($data as $item) {
        $materialsJson = json_encode($item['materials'] ?? []);
        $stmt->execute([
            $item['id'],
            $item['name'],
            $item['password'],
            $materialsJson
        ]);
    }
    
    $pdo->commit();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['error' => $e->getMessage()]);
}
?>