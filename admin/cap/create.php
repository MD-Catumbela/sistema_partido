<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/comites/lista_comite.php');
?>
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Adicionar Comité de Acção do Partido</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/cap/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">CAP</label>
                                                <input type="text" name="cap" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Comité</label>
                                                <div style="display:flex">
                                                    <select name="id_comite" id="" class="form-control">
                                                        <?php
                                                        foreach ($dados_comites as $dado_comite) { ?>
                                                            <option value="<?= $dado_comite['id_comite'] ?>"><?= $dado_comite['comite'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <a href="<?= APP_URL; ?>/admin/comites/create.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>                  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Registrar
                                                </button>
                                                <a href="<?= APP_URL; ?>/admin/cap" class="btn btn-danger">
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
include('../layout/mensagens.php');
include('../layout/rodape.php');
?>