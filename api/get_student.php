<?php
require_once 'config.php';

$name = $_GET['name'] ?? '';
$stmt = $pdo->prepare("SELECT progress_xp, progress_level FROM students WHERE name = ?");
$stmt->execute([$name]);
$student = $stmt->fetch();

if ($student) {
    echo json_encode(['success' => true, 'xp' => $student['progress_xp'], 'level' => $student['progress_level']]);
} else {
    echo json_encode(['success' => false]);
}
?>