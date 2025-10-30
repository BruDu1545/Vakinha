<?php
session_start();
include 'conn.php';

$login = $_POST['login'];
$password = $_POST['password'];

if ($_POST['action'] === "get") {
    if ($password && $login) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE `login` = ?');
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];

                echo json_encode(['success' => true, 'message' => "Login realizado com sucesso!"]);
                exit;
            } else {
                echo json_encode(['success' => false, 'message' => "Senha invalida"]);
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'message' => "Usuario nao enconrado"]);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => "Credenciais incompletas"]);
        exit;
    }
}
