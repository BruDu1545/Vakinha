<div class="main">
    <h2>Criar Vaquinha</h2>
    <form id="frm_vaquinha">
        <label for="titulo">Título da Campanha:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea>

        <label for="valor">Meta de Arrecadação (R$):</label>
        <input type="number" id="valor" name="valor" step="0.01" required>

        <button type="submit">Enviar</button>
    </form>
    <div class="list">
        <?php
        $qr = $pdo->query("SELECT * FROM vaquinha");
        $list = $qr->fetchAll(PDO::FETCH_ASSOC);

        foreach ($list as $row) {
            echo '
                    <div class="card">
                        <h3>' . $row['title'] . '</h3>
                        <p>' . $row['descp'] . '</p>
                        <p>' . $row['value'] . '</p>

                        <button data-id="' . $row['id'] . '">Doar</button>
                    </div>
                ';
        }
        ?>
    </div>
    <dialog id="dialogDoacao">
        <form method="dialog" id="formDoacao">
            <h3>Fazer uma Doação</h3>
            <input type="hidden" id="campanhaId" name="campanhaId">

            <label for="valorDoacao">Valor da Doação (R$):</label>
            <input type="number" id="valorDoacao" name="valorDoacao" step="0.01" required>

            <div style="margin-top: 15px;">
                <button id="confirmarDoacao">Confirmar</button>
                <button type="button" id="cancelarDoacao">Cancelar</button>
            </div>
        </form>
    </dialog>
</div>