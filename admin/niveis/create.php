<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
?>
<div class="content-wrapper" style="background-color: #fff;"> 
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Adicionar Nível de Acesso</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/niveis/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nível de Acesso</label>
                                                <input type="text" name="nivel" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Registrar
                                                </button>
                                                <a href="<?= APP_URL; ?>/admin/niveis" class="btn btn-danger">
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