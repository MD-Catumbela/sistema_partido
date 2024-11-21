<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/permissao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/militantes/lista_militantes.php');
?>
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Militantes</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Comité</th>
                                            <th>Foto</th>
                                            <th>Nome</th>
                                            <th>CAP</th>
                                            <th>CAS</th>
                                            <th>
                                                <center>Acções</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          usort($dados_militantes, function ($a, $b) {
                                            return strcmp($a['comite'], $b['comite']);
                                        });
                                        foreach ($dados_militantes as $dado_militante) {
                                            $id_militante = $dado_militante['id_militante']; ?>
                                            <tr>
                                                <td style="width: 20%;"><?= $dado_militante['comite']; ?></td>
                                                <td style="width: 10%;">
                                                    <img src="<?= APP_URL . "/admin/militantes/img/" . $dado_militante['imagen']; ?>" width="40px" alt="">
                                                </td>
                                                <td style="width: 40%;"><?= $dado_militante['nome_mi']; ?></td>
                                                <td style="width: 10%;"><?= $dado_militante['cap']; ?></td>
                                                <td style="width: 10%;" class="<?= $classe; ?> text-center"><?= $dado_militante['cas']; ?></td>
                                                <td style="width: 10%;text-align: center;">
                                                    <div class="btn-group">
                                                        <a href="create.php?id=<?= $id_militante; ?>" class="btn btn-success"><i class="fas fa-money-bill-alt"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../layout/mensagens.php');
include('../../admin/layout/rodape.php');
?>
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "Não há informação",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Militantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Militantes",
                "infoFiltered": "(Filtrado de _MAX_ total Militantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Militantes",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "search": "Procurar:",
                "zeroRecords": "Nenhum resultado encontrado",
                "paginate": {
                    "first": "Primeiro",
                    "last": "Ultimo",
                    "next": "Siguinte",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Relatórios',
                orientation: 'landscape',
                buttons: [{
                    text: 'copiar',
                    extend: 'copy'
                }, {
                    extend: 'excel'
                }, {
                    extend: 'pdf'
                }, {
                    text: 'imprimir',
                    extend: 'print'
                }, {
                    text: 'visualizar',
                    extend: 'colvis'
                }]
            }],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>