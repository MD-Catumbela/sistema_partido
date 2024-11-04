<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/cas/update_cas.php');

?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                    <div class="card card-outline card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>Actualizar Comité de Acção do Sector</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/cas/update.php" method="post">
                                    <input type="text" name="id_cas" value="<?= $id_cas_get; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Sector</label>
                                                <input type="text" name="cas" class="form-control" value="<?= $cas; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="">Descrição</label>
                                                <input type="text" name="descricao_cas" class="form-control" value="<?= $descricao_cas; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
                                                </button>
                                                <a href="<?= APP_URL; ?>/cas" class="btn btn-default">
                                                    <i class="fas fa-times-circle"></i> Cancelar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIM CORPO DO CODIGO -->
<?php
include('../layout/mensagens.php');
include('../layout/rodape.php');
?>