<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, serie, text, options, correct, difficulty, explanation FROM quizzes");
$quizzes = $stmt->fetchAll();
foreach ($quizzes as &$q) {
    $q['options'] = json_decode($q['options'], true);
}
echo json_encode($quizzes);
?>