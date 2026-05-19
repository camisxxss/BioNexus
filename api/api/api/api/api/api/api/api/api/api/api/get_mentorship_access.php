<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT * FROM mentorship_access ORDER BY data DESC");
echo json_encode($stmt->fetchAll());
?>