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
                                <h3 class="card-title"><b>Adicionar Comité</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/comites/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Comité</label>
                                                <input type="text" name="comite" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="municipio">Município</label>
                                                <select name="municipio" class="form-control">
                                                    <option value="Benguela">Benguela</option>
                                                    <option value="Baía Farta">Baía Farta</option>
                                                    <option value="Catumbela">Catumbela</option>
                                                    <option value="Caimbambo">Caimbambo</option>
                                                    <option value="Chongoroi">Chongoroi</option>
                                                    <option value="Ganda">Ganda</option>
                                                    <option value="Lobito">Lobito</option>
                                                    <option value="Luanda">Luanda</option>
                                                    <option value="Bengo">Bengo</option>
                                                    <option value="Amboim">Amboim</option>
                                                    <option value="Bambungo">Bambungo</option>
                                                    <option value="Malanje">Malanje</option>
                                                    <option value="Cangandala">Cangandala</option>
                                                    <option value="Mucari">Mucari</option>
                                                    <option value="Lunda Norte">Lunda Norte</option>
                                                    <option value="Lunda Sul">Lunda Sul</option>
                                                    <option value="Namibe">Namibe</option>
                                                    <option value="Moxico">Moxico</option>
                                                    <option value="Quando Cubango">Quando Cubango</option>
                                                    <option value="Uíge">Uíge</option>
                                                    <option value="Zaire">Zaire</option>
                                                    <option value="Cabinda">Cabinda</option>
                                                    <option value="Kwanza Norte">Kwanza Norte</option>
                                                    <option value="Kwanza Sul">Kwanza Sul</option>
                                                    <option value="Bié">Bié</option>
                                                    <option value="Cunene">Cunene</option>
                                                    <option value="Huambo">Huambo</option>
                                                    <option value="Malanje">Malanje</option>
                                                    <option value="Luanda">Luanda</option>
                                                    <option value="Moxico">Moxico</option>
                                                    <option value="Namibe">Namibe</option>
                                                    <option value="Benguela">Benguela</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="provincia">Província</label>
                                                <select name="provincia" class="form-control">
                                                    <option value="Bengo">Bengo</option>
                                                    <option value="Benguela">Benguela</option>
                                                    <option value="Bié">Bié</option>
                                                    <option value="Cabinda">Cabinda</option>
                                                    <option value="Cunene">Cunene</option>
                                                    <option value="Cuando Cubango">Cuando Cubango</option>
                                                    <option value="Huambo">Huambo</option>
                                                    <option value="Kwanza Norte">Kwanza Norte</option>
                                                    <option value="Kwanza Sul">Kwanza Sul</option>
                                                    <option value="Luanda">Luanda</option>
                                                    <option value="Lunda Norte">Lunda Norte</option>
                                                    <option value="Lunda Sul">Lunda Sul</option>
                                                    <option value="Malanje">Malanje</option>
                                                    <option value="Moxico">Moxico</option>
                                                    <option value="Namibe">Namibe</option>
                                                    <option value="Uíge">Uíge</option>
                                                    <option value="Zaire">Zaire</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Registrar
                                                </button>
                                                <a href="<?= APP_URL; ?>/admin/comites" class="btn btn-danger">
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