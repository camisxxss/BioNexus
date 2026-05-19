<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, name, password, materials FROM classrooms");
$salas = $stmt->fetchAll();
foreach ($salas as &$s) {
    $s['materials'] = json_decode($s['materials'], true);
}
echo json_encode($salas);
?>