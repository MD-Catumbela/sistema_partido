<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/cap/carregar_cap.php');
include('../../app/controllers/comites/lista_comite.php');

?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper" style="background-color: #fff;">   
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-success">
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
                                                    <select name="id_comite" id="" class="form-control">
                                                        <?php
                                                        foreach ($dados_comites as $dado_comite) {
                                                            $comite_tabela = $dado_comite['comite'];
                                                            $id_comite = $dado_comite['id_comite'] ?>
                                                            <option value="<?= $id_comite; ?>" <?php if ($comite_tabela == $comite) { ?> selected="selected" <?php } ?>>
                                                                <?= $comite_tabela; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
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
<!-- FIM CORPO DO CODIGO -->
<?php
include('../../layout/mensagens.php');
include('../../admin/layout/rodape.php');
?>