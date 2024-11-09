<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/niveis/lista_niveis.php');



// Recuperar os dados dos militantes
$query = "SELECT * FROM tb_militantes";
$stmt = $pdo->prepare($query);
$stmt->execute();
$militantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


    <div class="container">
        <h1>Gestão de Quotas dos Militantes</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quota Mensal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($militantes as $militante): ?>
                    <tr>
                        <td><?= htmlspecialchars($militante['nome_mi']) ?></td>
                        <td>
                            <form method="POST" action="processa_quota.php">
                                <input type="number" name="quota_mensal" value="<?= $militante['quota_mensal'] ?>" step="0.01" required>
                                <input type="hidden" name="id_militante" value="<?= $militante['id_militante'] ?>">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                        <td>
                            <a href="pagar_quota.php?id=<?= $militante['id_militante'] ?>">Registrar Pagamento</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<!-- FIM CORPO DO CODIGO -->
<?php
include('../../layout/mensagens.php');
include('../../admin/layout/rodape.php');
?>
