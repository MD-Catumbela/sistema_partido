<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/niveis/lista_niveis.php');
?>
<div class="content-wrapper" style="background-color: #fff;">   
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Adicionar Usuário</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/usuarios/create.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nome Completo</label>
                                                <input type="text" name="nome" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Usuário</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Senha</label>
                                                <input type="text" name="password_user" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Confirmar Senha</label>
                                                <input type="text" name="password_repet" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nível de Acesso</label>
                                                <div style="display:flex">
                                                    <select name="nivel" id="" class="form-control">
                                                        <?php
                                                        foreach ($dados_niveis as $dado_nivel) { ?>
                                                            <option value="<?= $dado_nivel['id_nivel'] ?>"><?= $dado_nivel['nivel'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <a href="<?= APP_URL; ?>/admin/niveis/create.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                                <a href="<?= APP_URL; ?>/admin/usuarios" class="btn btn-danger">
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