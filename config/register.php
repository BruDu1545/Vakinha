<?php
session_start();
include 'conn.php';

$name = $_POST['nome'];
$login = $_POST['email'];
$password = $_POST['senha'];

if ($name && $login && $password) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE `login` = ?');
    $stmt->execute([$login]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo json_encode(['success' => false, 'message' => "Login já está em uso"]);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare('INSERT INTO users (`name`, `login`, `password`, `role`) VALUES (?, ?, ?, ?)');
    $success = $stmt->execute([$name, $login, $hashedPassword, 'user']);

    if ($success) {
        echo json_encode(['success' => true, 'message' => "Registro realizado com sucesso!"]);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => "Erro ao registrar usuário"]);
        exit;
    }
} else {
    echo json_encode(['success' => false, 'message' => "Preencha todos os campos"]);
    exit;
}
