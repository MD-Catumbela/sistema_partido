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
                    <div class="col-md">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title"><b>Adicionar Comité de Acção do Partido</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/cap/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">CAP</label>
                                                <input type="text" name="cap" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Sector</label>
                                                <div style="display:flex">
                                                    <select name="id_cas" id="" class="form-control">
                                                        <?php
                                                        foreach ($dados_cas as $dado_cas) { ?>
                                                            <option value="<?= $dado_cas['id_cas'] ?>"><?= $dado_cas['cas'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <a href="<?= APP_URL; ?>/cas/create.php" class="btn btn-default"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Descrição</label>
                                                <input type="text" name="descricao_cap" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-save"></i> Registrar
                                                </button>
                                                <a href="<?= APP_URL; ?>/cap" class="btn btn-default">
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