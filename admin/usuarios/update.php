<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/usuarios/show_usuario.php');
include('../../app/controllers/niveis/lista_niveis.php');
?>
<div class="content-wrapper" style="background-color: #fff;">   
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Actualizar Usuário</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/usuarios/update.php" method="post">
                                    <input type="text" name="id_usuario" value="<?= $id_usuario_get; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nome Completo</label>
                                                <input type="text" name="nome" class="form-control" value="<?= $nome; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Usuário</label>
                                                <input type="text" name="username" class="form-control" value="<?= $username; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nível de Acesso</label>
                                                <select name="nivel" id="" class="form-control">
                                                    <?php
                                                    foreach ($dados_niveis as $dado_nivel) {
                                                        $nivel_tabela = $dado_nivel['nivel'];
                                                        $id_nivel = $dado_nivel['id_nivel'] ?>
                                                        <option value="<?= $id_nivel; ?>" <?php if ($nivel_tabela == $nivel) { ?> selected="selected" <?php } ?>>
                                                            <?= $nivel_tabela; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Senha</label>
                                                <input type="text" name="password_user" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Senha</label>
                                                <input type="text" name="password_repet" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
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