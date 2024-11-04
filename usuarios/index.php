<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/usuarios/lista_usuarios.php');

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
                                <h3 class="card-title"><b>Usuários</b></h3>
                                <h3 class="card-title">Lista de Usuários</h3>
                                <div class="card-tools">
                                    <a href="create.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Adicionar</a>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nº <center>
                                            </th>
                                            <th>Nome Completo</th>
                                            <th>Usuário</th>
                                            <th>Nível</th>
                                            <th>
                                                <center>Ações</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($dados_usuarios as $dado_usuario) {
                                            $id_usuario = $dado_usuario['id_usuario']; ?>
                                            <tr>
                                                <td style="width: 8%; text-align: center;"><?php echo ++$contador; ?></td>
                                                <td style="width: 30%;"><?php echo $dado_usuario['nome']; ?></td>
                                                <td style="width: 20%;"><?php echo $dado_usuario['username']; ?></td>
                                                <td style="width: 20%;"><?php echo $dado_usuario['nivel']; ?></td>
                                                <td style="width: 9%; text-align: center;">
                                                    <div class="btn-group">
                                                        <a href="update.php?id=<?php echo $id_usuario; ?>" class="btn btn-default btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="confirmDelete('<?= APP_URL; ?>/app/controllers/usuarios/delete.php?id=<?= $id_usuario; ?>')">
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
                window.location.href = url;
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuários",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuários",
                "infoFiltered": "(Filtrado de _MAX_ total Usuários)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuários",
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