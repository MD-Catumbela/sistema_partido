<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/comites/update_comite.php');

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
                                <h3 class="card-title"><b>Actualizar Comité</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/comites/update.php" method="post">
                                    <input type="text" name="id_comite" value="<?= $id_comite_get; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Sector</label>
                                                <input type="text" name="comite" class="form-control" value="<?= $comite; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="municipio">Município</label>
                                                <select name="municipio" class="form-control">
                                                    <option value="BENGUELA" <?php if ($municipio == "BENGUELA") echo 'selected'; ?>>BENGUELA</option>
                                                    <option value="BAÍA FARTA" <?php if ($municipio == "BAÍA FARTA") echo 'selected'; ?>>BAÍA FARTA</option>
                                                    <option value="CATUMBELA" <?php if ($municipio == "CATUMBELA") echo 'selected'; ?>>CATUMBELA</option>
                                                    <option value="CAIMBAMBO" <?php if ($municipio == "CAIMBAMBO") echo 'selected'; ?>>CAIMBAMBO</option>
                                                    <option value="CHONGOROI" <?php if ($municipio == "CHONGOROI") echo 'selected'; ?>>CHONGOROI</option>
                                                    <option value="GANDA" <?php if ($municipio == "GANDA") echo 'selected'; ?>>GANDA</option>
                                                    <option value="LOBITO" <?php if ($municipio == "LOBITO") echo 'selected'; ?>>LOBITO</option>
                                                    <option value="LUANDA" <?php if ($municipio == "LUANDA") echo 'selected'; ?>>LUANDA</option>
                                                    <option value="BENGO" <?php if ($municipio == "BENGO") echo 'selected'; ?>>BENGO</option>
                                                    <option value="AMBOIM" <?php if ($municipio == "AMBOIM") echo 'selected'; ?>>AMBOIM</option>
                                                    <option value="BAMBUNGO" <?php if ($municipio == "BAMBUNGO") echo 'selected'; ?>>BAMBUNGO</option>
                                                    <option value="MALANJE" <?php if ($municipio == "MALANJE") echo 'selected'; ?>>MALANJE</option>
                                                    <option value="CANGANDALA" <?php if ($municipio == "CANGANDALA") echo 'selected'; ?>>CANGANDALA</option>
                                                    <option value="MUCARI" <?php if ($municipio == "MUCARI") echo 'selected'; ?>>MUCARI</option>
                                                    <option value="LUNDA NORTE" <?php if ($municipio == "LUNDA NORTE") echo 'selected'; ?>>LUNDA NORTE</option>
                                                    <option value="LUNDA SUL" <?php if ($municipio == "LUNDA SUL") echo 'selected'; ?>>LUNDA SUL</option>
                                                    <option value="NAMIBE" <?php if ($municipio == "NAMIBE") echo 'selected'; ?>>NAMIBE</option>
                                                    <option value="MOXICO" <?php if ($municipio == "MOXICO") echo 'selected'; ?>>MOXICO</option>
                                                    <option value="QUANDO CUBANGO" <?php if ($municipio == "QUANDO CUBANGO") echo 'selected'; ?>>QUANDO CUBANGO</option>
                                                    <option value="UÍGE" <?php if ($municipio == "UÍGE") echo 'selected'; ?>>UÍGE</option>
                                                    <option value="ZAIRE" <?php if ($municipio == "ZAIRE") echo 'selected'; ?>>ZAIRE</option>
                                                    <option value="CABINDA" <?php if ($municipio == "CABINDA") echo 'selected'; ?>>CABINDA</option>
                                                    <option value="KWANZA NORTE" <?php if ($municipio == "KWANZA NORTE") echo 'selected'; ?>>KWANZA NORTE</option>
                                                    <option value="KWANZA SUL" <?php if ($municipio == "KWANZA SUL") echo 'selected'; ?>>KWANZA SUL</option>
                                                    <option value="BIÉ" <?php if ($municipio == "BIÉ") echo 'selected'; ?>>BIÉ</option>
                                                    <option value="CUNENE" <?php if ($municipio == "CUNENE") echo 'selected'; ?>>CUNENE</option>
                                                    <option value="HUAMBO" <?php if ($municipio == "HUAMBO") echo 'selected'; ?>>HUAMBO</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="provincia">Província</label>
                                                <select name="provincia" class="form-control">
                                                    <option value="BENGO" <?php if ($provincia == "BENGO") echo 'selected'; ?>>BENGO</option>
                                                    <option value="BENGUELA" <?php if ($provincia == "BENGUELA") echo 'selected'; ?>>BENGUELA</option>
                                                    <option value="BIÉ" <?php if ($provincia == "BIÉ") echo 'selected'; ?>>BIÉ</option>
                                                    <option value="CABINDA" <?php if ($provincia == "CABINDA") echo 'selected'; ?>>CABINDA</option>
                                                    <option value="CUNENE" <?php if ($provincia == "CUNENE") echo 'selected'; ?>>CUNENE</option>
                                                    <option value="CUANDO CUBANGO" <?php if ($provincia == "CUANDO CUBANGO") echo 'selected'; ?>>CUANDO CUBANGO</option>
                                                    <option value="HUAMBO" <?php if ($provincia == "HUAMBO") echo 'selected'; ?>>HUAMBO</option>
                                                    <option value="KWANZA NORTE" <?php if ($provincia == "KWANZA NORTE") echo 'selected'; ?>>KWANZA NORTE</option>
                                                    <option value="KWANZA SUL" <?php if ($provincia == "KWANZA SUL") echo 'selected'; ?>>KWANZA SUL</option>
                                                    <option value="LUANDA" <?php if ($provincia == "LUANDA") echo 'selected'; ?>>LUANDA</option>
                                                    <option value="LUNDA NORTE" <?php if ($provincia == "LUNDA NORTE") echo 'selected'; ?>>LUNDA NORTE</option>
                                                    <option value="LUNDA SUL" <?php if ($provincia == "LUNDA SUL") echo 'selected'; ?>>LUNDA SUL</option>
                                                    <option value="MALANJE" <?php if ($provincia == "MALANJE") echo 'selected'; ?>>MALANJE</option>
                                                    <option value="MOXICO" <?php if ($provincia == "MOXICO") echo 'selected'; ?>>MOXICO</option>
                                                    <option value="NAMIBE" <?php if ($provincia == "NAMIBE") echo 'selected'; ?>>NAMIBE</option>
                                                    <option value="UÍGE" <?php if ($provincia == "UÍGE") echo 'selected'; ?>>UÍGE</option>
                                                    <option value="ZAIRE" <?php if ($provincia == "ZAIRE") echo 'selected'; ?>>ZAIRE</option>
                                                </select>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
                                                </button>
                                                <a href="<?= APP_URL; ?>/comites" class="btn btn-default">
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