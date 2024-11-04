<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/cap/carregar_cap.php');
include('../app/controllers/cas/lista_cas.php');

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
                                <h3 class="card-title"><b>Actualizar Comité de Acção do Partido</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/cap/update.php" method="post">
                                    <input type="text" name="id_cap" value="<?= $id_cap_get; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">CAP</label>
                                                <input type="text" name="cap" class="form-control" value="<?= $cap; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Sector</label>
                                                <div style="display:flex">
                                                    <select name="id_cas" id="" class="form-control">
                                                        <?php
                                                        foreach ($dados_cas as $dado_cas) {
                                                            $cas_tabela = $dado_cas['cas'];
                                                            $id_funcao = $dado_cas['id_cas'] ?>
                                                            <option value="<?= $id_funcao; ?>" <?php if ($cas_tabela == $cas) { ?> selected="selected" <?php } ?>>
                                                                <?= $cas_tabela; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Descrição</label>
                                                <input type="text" name="descricao_cap" class="form-control" value="<?= $descricao_cap; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
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