<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, name, progress_xp, progress_level, last_daily, created_at FROM students ORDER BY name");
echo json_encode($stmt->fetchAll());
?>