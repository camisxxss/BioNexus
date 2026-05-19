<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$xp = $data['xp'];
$level = $data['level'];

$stmt = $pdo->prepare("UPDATE students SET progress_xp = ?, progress_level = ? WHERE name = ?");
$stmt->execute([$xp, $level, $name]);

echo json_encode(['success' => true]);
?>