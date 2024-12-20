<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/funcoes/update_funcoes.php');
?>
<div class="content-wrapper" style="background-color: #fff;"> 
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Actualizar Função</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/funcoes/update.php" method="post">
                                    <input type="text" name="id_funcao" value="<?= $id_funcao_get; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Função</label>
                                                <input type="text" name="funcao" class="form-control" value="<?= $funcao; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
                                                </button>
                                                <a href="<?= APP_URL; ?>/admin/funcoes" class="btn btn-danger">
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
<?php
include('../../layout/mensagens.php');
include('../../admin/layout/rodape.php');
?>