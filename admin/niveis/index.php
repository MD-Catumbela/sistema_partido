<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/permissao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/niveis/lista_niveis.php');
?>
<div class="content-wrapper" style="background-color: #fff;"> 
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Níveis de Acesso</b></h3>

                                <div class="card-tools">
                                    <a href="create.php" class="btn btn-primary"><i class="fas fa-user-tag"></i> Adicionar</a>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nº <center>
                                            </th>
                                            <th>Nível de Acesso</th>
                                            <th>
                                                <center>Acções</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                          usort($dados_niveis, function ($a, $b) {
                                            return strcmp($a['nivel'], $b['nivel']);
                                        });
                                        foreach ($dados_niveis as $dado_nivel) {
                                            $id_nivel = $dado_nivel['id_nivel']; ?>
                                            <tr>
                                                <td style="width: 10%; text-align: center;"><?= ++$contador; ?></td>
                                                <td style="width: 80%;"><?= $dado_nivel['nivel']; ?></td>
                                                <td style="width: 10%; text-align: center;">
                                                    <div class="btn-group">
                                                        <a href="update.php?id=<?= $id_nivel; ?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDelete('<?= APP_URL; ?>/app/controllers/niveis/delete.php?id=<?= $id_nivel; ?>')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
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
            window.location.href = url; // Redireciona para o link de exclusão
        }
    });
}
</script>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Níveis",
                "infoEmpty": "Mostrando 0 a 0 de 0 Níveis",
                "infoFiltered": "(Filtrado de _MAX_ total Níveis)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Níveis",
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>