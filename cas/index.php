<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/cas/lista_cas.php');

?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-outline card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>Comité de Acção do Sector</b></h3>
                                <div class="card-tools">
                                    <a href="create.php" class="btn btn-default"><i class="fas fa-project-diagram"></i> Adicionar</a>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nº <center>
                                            </th>
                                            <th>Comité de Acção do Sector</th>
                                            <th>Descrição</th>
                                            <th>
                                               
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($dados_cas as $dado_cas) {
                                            $id_cas = $dado_cas['id_cas']; ?>
                                            <tr>
                                                <td style="width: 10%; text-align: center;"><?= ++$contador; ?></td>
                                                <td style="width: 40%;"><?= $dado_cas['cas']; ?></td>
                                                <td style="width: 40%;"><?= $dado_cas['descricao_cas']; ?></td>
                                                <td style="width: 10%; text-align: center;">
                                                    <div class="btn-group">
                                                        <a href="update.php?id=<?= $id_cas; ?>" class="btn btn-default btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="confirmDelete('<?= APP_URL; ?>/app/controllers/cas/delete.php?id=<?= $id_cas; ?>')">
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
<!-- FIM CORPO DO CODIGO -->
<?php
include('../layout/mensagens.php');
include('../layout/rodape.php');
?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "Não há informação",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Sectores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Sectores",
                "infoFiltered": "(Filtrado de _MAX_ total Sectores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Sectores",
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