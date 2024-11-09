<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/cas/lista_cas.php');
include('../../app/controllers/comites/lista_comite.php');
?>
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-success">
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
                                                <a href="<?= APP_URL; ?>/admin/cas" class="btn btn-danger">
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