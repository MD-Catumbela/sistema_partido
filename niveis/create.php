<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
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
                                <h3 class="card-title"><b>Adicionar Nível</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/niveis/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nome</label>
                                                <input type="text" name="nivel" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-save"></i> Registrar
                                                </button>
                                                <a href="<?= APP_URL; ?>/niveis" class="btn btn-default">
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