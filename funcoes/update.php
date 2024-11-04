<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/funcaos/update_funcaos.php');

?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper" style="background-color: #fff;"> 
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>Actualizar funcao</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/funcaos/update.php" method="post">
                                    <input type="text" name="id_funcao" value="<?= $id_funcao_get; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nome</label>
                                                <input type="text" name="funcao" class="form-control" value="<?= $funcao; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
                                                </button>
                                                <a href="<?= APP_URL; ?>/funcaos" class="btn btn-default">
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