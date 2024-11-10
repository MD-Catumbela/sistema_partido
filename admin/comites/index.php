<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/permissao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/niveis/lista_niveis.php');
include('../../app/controllers/cas/lista_cas.php');
include('../../app/controllers/cap/lista_cap.php');
include('../../app/controllers/funcoes/lista_funcoes.php');
include('../../app/controllers/comites/lista_comite.php');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!--DADOS-->
                <div class="col sm-12">
                    <div class="content">
                        <div class="row">
                            <!-- MPLA-->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box">
                                    <img src="<?= APP_URL; ?>/public/img/mpla.jpg" alt="JMPLA" class="brand-image img-circle elevation-3" style="opacity: .8, width: 100px; height: 100px;">
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Total de Comites</font>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            $contador_nivel = 0;
                                            foreach ($dados_comites as $dado_comite) {
                                                $contador_nivel = $contador_nivel + 1;
                                            }
                                            ?>
                                        </span>
                                        <div>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><?= $contador_nivel ?></font>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FUNCÕES -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box mb-3">
                                    <img src="<?= APP_URL; ?>/public/img/nivel_seguranca.png" alt="JMPLA" class="brand-image img-circle elevation-3" style="opacity: .8, width: 110px; height: 100px;">
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <a href="<?= APP_URL; ?>/admin/funcoes" style="vertical-align: inherit;">Funções</a>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            $contador_nivel = 0;
                                            foreach ($dados_funcoes as $dado_funcao) {
                                                $contador_nivel = $contador_nivel + 1;
                                            }
                                            ?>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><?= $contador_nivel ?></font>
                                            </font>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- NÍVEL -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box mb-3">
                                    <img src="<?= APP_URL; ?>/public/img/nivel_seguranca.png" alt="Nivel" class="brand-image img-circle elevation-3" style="opacity: .8, width: 110px; height: 100px;">
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <a href="<?= APP_URL; ?>/admin/niveis" style="vertical-align: inherit;">Nível de Segurança</a>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            $contador_nivel = 0;
                                            foreach ($dados_niveis as $dado_nivel) {
                                                $contador_nivel = $contador_nivel + 1;
                                            }
                                            ?>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><?= $contador_nivel ?></font>
                                            </font>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--COMITES-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Comités</b></h3>
                                    <div class="card-tools">
                                        <a href="create.php" class="btn btn-primary"><i class="fas fa-sitemap"></i> Adicionar</a>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <table id="example1" class="table table-bordered table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <center>Nº <center>
                                                </th>
                                                <th>Comité</th>
                                                <th>Município</th>
                                                <th>Província</th>
                                                <th>
                                                    <center> Acções<center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $contador = 0;
                                            // ordem alfabetica
                                            usort($dados_comites, function ($a, $b) {
                                                return strcmp($a['comite'], $b['comite']);
                                            });
                                            foreach ($dados_comites as $dado_comite) {
                                                $id_comite = $dado_comite['id_comite']; ?>
                                                <tr>
                                                    <td style="width: 10%; text-align: center;"><?= ++$contador; ?></td>
                                                    <td style="width: 20%;"><?= $dado_comite['comite']; ?></td>
                                                    <td style="width: 20%;"><?= $dado_comite['municipio']; ?></td>
                                                    <td style="width: 20%;"><?= $dado_comite['provincia']; ?></td>
                                                    <td style="width: 10%; text-align: center;">
                                                        <div class="btn-group">
                                                            <a href="update.php?id=<?= $id_comite; ?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDelete('<?= APP_URL; ?>/app/controllers/comites/delete.php?id=<?= $id_comite; ?>')">
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Comités",
                "infoEmpty": "Mostrando 0 a 0 de 0 Comités",
                "infoFiltered": "(Filtrado de _MAX_ total Comités)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Comités",
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