<?php
$id_militante = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/permissao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/militantes/carregar_militante.php');
include('../../app/controllers/quotas/lista_militantes_pago.php');
?>
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Quotas Pagas do Militante:</b> <?= $nome_mi; ?> </h3>
                                <div class="card-tools">
                                    <div>
                                        <!-- Botão para abrir o modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-money-bill"></i> Adicionar Quota
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-striped table-bordered table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th class="bg-dark text-white text-center">Nº</th>
                                            <th class="bg-dark text-white ">Mês</th>
                                            <th class="bg-dark text-white">Quantia</th>
                                            <th class="bg-dark text-white">Data</th>
                                            <th class="bg-dark text-white text-center">Acções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_quota = 0;
                                        $contador = 0;


                                       

                                        foreach ($dados_quotas as $dado_quota) {
                                            $id_quota = $dado_quota['id_quota'];
                                            $total_quota += $dado_quota['valor_pago'];
                                        ?>
                                            <tr>
                                                <td style="width: 10%"><?= $contador = $contador + 1; ?></td>
                                                <td style="width: 30%"><?= $dado_quota['mes_pago']; ?></td>
                                                <td style="width: 25%"><?= $dado_quota['valor_pago']; ?> Kz</td>
                                                <td style="width: 25%"><?= $dado_quota['data_pago']; ?></td>
                                                <td style="width: 10%; text-align: center;">
                                                    <div class="btn-group">
                                                        <!-- Botão para abrir o modal de edição -->
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal"
                                                            data-id="<?= $id_quota; ?>"
                                                            data-mes="<?= $dado_quota['mes_pago']; ?>"
                                                            data-valor="<?= $dado_quota['valor_pago']; ?>"
                                                            data-data="<?= $dado_quota['data_pago']; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <a href="imprimir.php?id=<?= $id_militante; ?>" class="btn btn-dark"><i class="fas fa-print"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete('<?= APP_URL; ?>/app/controllers/quotas/delete.php?id=<?= $id_quota; ?>')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right"><b>Total de Quotas Pagas:</b></td>
                                            <td class="text-center"><b id="total_quotas">0 Kz</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Essa ação não poderá ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
<?php
include('../../layout/mensagens.php');
include('../../admin/layout/rodape.php');
?>
<!-- Modal de Adicionar Quota -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Quota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL; ?>/app/controllers/quotas/create.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_militante" value="<?= $id_militante; ?>" hidden>
                                <label for="id_quota">Militante</label>
                                <input type="text" class="form-control" value="<?= $nome_mi; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mes_pago">Mês Pago</label>
                                <select name="mes_pago" id="mes_pago" class="form-control">
                                    <option value="Janeiro">Janeiro</option>
                                    <option value="Fevereiro">Fevereiro</option>
                                    <option value="Março">Março</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Maio">Maio</option>
                                    <option value="Junho">Junho</option>
                                    <option value="Julho">Julho</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setembro">Setembro</option>
                                    <option value="Outubro">Outubro</option>
                                    <option value="Novembro">Novembro</option>
                                    <option value="Dezembro">Dezembro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor_pago">Valor Pago</label>
                                <input type="number" name="valor_pago" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_pago">Ano do Pagamento</label>
                                <input type="number" class="form-control" name="data_pago" min="1900" max="2099" step="1" value="<?= date('Y'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times-circle"></i> Fechar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Atualização -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="updateModalLabel">Atualizar Quota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= APP_URL; ?>/app/controllers/quotas/update.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_quota" id="id_quota">
                                <input type="hidden" class="form-control" name="id_militante" value="<?= $id_militante; ?>" hidden>
                                <label for="id_quota">Militante</label>
                                <input type="text" class="form-control" value="<?= $nome_mi; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mes_pago">Mês Pago</label>
                                <select name="mes_pago" id="mes_pago" class="form-control">
                                    <option value="Janeiro">Janeiro</option>
                                    <option value="Fevereiro">Fevereiro</option>
                                    <option value="Março">Março</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Maio">Maio</option>
                                    <option value="Junho">Junho</option>
                                    <option value="Julho">Julho</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setembro">Setembro</option>
                                    <option value="Outubro">Outubro</option>
                                    <option value="Novembro">Novembro</option>
                                    <option value="Dezembro">Dezembro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor_pago">Valor Pago</label>
                                <input type="number" name="valor_pago" class="form-control" id="valor_pago" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="data_pago">Ano do Pagamento</label>
                                <input type="number" class="form-control" name="data_pago" id="data_pago" min="1900" max="2099" step="1" value="<?= date('Y'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Atualizar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fas fa-times-circle"></i> Fechar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#updateModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botão que abriu o modal
        var id_quota = button.data('id');
        var mes_pago = button.data('mes');
        var valor_pago = button.data('valor');
        var data_pago = button.data('data');

        // Preenche os campos do modal com os dados da quota
        var modal = $(this);
        modal.find('#id_quota').val(id_quota);
        modal.find('#mes_pago').val(mes_pago);
        modal.find('#valor_pago').val(valor_pago);
        modal.find('#data_pago').val(data_pago);
    });
</script>
<script>
    $(function() {
        var table = $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "Não há informação",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Quotas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Quotas",
                "infoFiltered": "(Filtrado de _MAX_ total Quotas)",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Quotas",
                "search": "Procurar:",
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        });
        // Função para calcular o total das quotas visíveis
        function calcularTotal() {
            var total = 0;
            // Seleciona os dados da coluna 'Quantia' (assumindo que seja a coluna 2)
            table.column(2, {
                search: 'applied'
            }).data().each(function(value, index) {
                total += parseFloat(value.replace(' Kz', '').replace(',', '.')); // Remove 'Kz' e converte para float
            });
            // Exibe o total calculado na última linha
            $('#total_quotas').text(total.toFixed(2).replace('.', ',') + ' Kz');
        }
        // Chama a função calcularTotal após inicializar o DataTable
        table.on('draw', function() {
            calcularTotal();
        });
        // Calcular o total na primeira vez
        calcularTotal();
    });
</script>