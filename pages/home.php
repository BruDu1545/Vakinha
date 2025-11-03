<div class="container">
    <section class="form-section">
        <h2>Criar Vaquinha</h2>
        <form id="frm_vaquinha">
            <label for="titulo">Título da Campanha:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <label for="valor">Meta de Arrecadação (R$):</label>
            <input type="number" id="valor" name="valor" step="0.01" required>

            <label for="link">Link: </label>
            <input type="text" id="link" name="link" required>

            <button type="submit">Enviar</button>
        </form>
    </section>
    <div class="list">
        <?php
        $qr = $pdo->query("SELECT * FROM vaquinha");
        $list = $qr->fetchAll(PDO::FETCH_ASSOC);

        foreach ($list as $row) {
            echo '
                    <div class="card">
                        ' . ($row['link'] ? '<img src="' . $row['link'] . '" class="card-img" alt="' . $row['title'] . '">' : '<div class="no-image">Sem imagem</div>') . '                        <h3>' . $row['title'] . '</h3>
                        <p>' . $row['descp'] . '</p>
                        <p>Meta: ' . $row['value'] . '</p>
                        <p>Arrecadado: ' . $row['doado'] . '</p>
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

            <input type="range" id="valorDoacao" name="valorDoacao" min="1" max="1000" step="1" value="10">
            <div class="range-value" id="rangeValue">R$ 500,00</div>

            <div style="margin-top: 15px;">
                <button id="confirmarDoacao">Confirmar</button>
                <button type="button" id="cancelarDoacao">Cancelar</button>
            </div>
        </form>
    </dialog>
</div>