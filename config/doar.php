<?php
include 'conn.php';

if ($_POST['action'] === 'doar') {
    $campanha_id = $_POST['campanha_id'] ?? '';
    $valor = $_POST['valor'] ?? '';

    if ($campanha_id && $valor) {
        $stmt = $pdo->prepare("UPDATE vaquinha SET doado = doado + ? WHERE id = ?");
        $success = $stmt->execute([$valor, $campanha_id]);

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Doação registrada com sucesso!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar valor arrecadado.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Dados incompletos.']);
    }
}