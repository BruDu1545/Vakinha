<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $valor = $_POST['valor'] ?? '';
    $link = $_POST['link'] ?? '';

    if ($titulo && $descricao && $valor) {
        $stmt = $pdo->prepare("INSERT INTO vaquinha (title, descp, link value) VALUES (?, ?, ?, ?)");
        $success = $stmt->execute([$titulo, $descricao, $link, $valor]);

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Campanha criada com sucesso!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao salvar no banco de dados.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
    }
}