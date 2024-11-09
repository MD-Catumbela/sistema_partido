<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/militantes/carregar_militante.php');
include('../../app/controllers/cap/lista_cap.php');
include('../../app/controllers/cas/lista_cas.php');
include('../../app/controllers/comites/lista_comite.php');
include('../../app/controllers/funcoes/lista_funcoes.php');
?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><b>Dados do Militante</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/militantes/delete.php" method="post" enctype="multipart/form-data">
                                    <input type="text" value="<?= $id_militante_get; ?>" name="id_militante" hidden>
                                    <!-- DADOS PESSOAIS -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nome">Nome Completo</label>
                                                        <input type="text" name="nome_mi" class="form-control" value="<?= $nome_mi; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nome_pai">Nome do Pai</label>
                                                        <input type="text" name="nome_pai" class="form-control" value="<?= $nome_pai; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nome_mae">Nome da Mãe</label>
                                                        <input type="text" name="nome_mae" class="form-control" value="<?= $nome_mae; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="genero">Gênero</label>
                                                        <select name="genero" class="form-control" disabled>
                                                            <option value="M" <?php if ($genero == "M") echo 'selected'; ?>>Masculino</option>
                                                            <option value="F" <?php if ($genero == "F") echo 'selected'; ?>>Feminino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bi">Nº do B.I</label>
                                                        <input type="text" name="bi" class="form-control" value="<?= $bi; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="d_nascimento">Data Nascimento</label>
                                                        <input type="date" name="d_nascimento" id="d_nascimento" class="form-control" value="<?= $d_nascimento; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="idade">Idade</label>
                                                        <input type="number" name="idade" id="idade" class="form-control" value="<?= $idade; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="endereco">Residência</label>
                                                        <input type="text" name="endereco" class="form-control" value="<?= $endereco; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen</label>
                                                <center>
                                                    <img src="<?= APP_URL . "/admin/militantes/img/" . $imagen; ?>" width="150px" alt="">
                                                </center>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="tel">Telefone</label>
                                                        <input type="number" name="tel" class="form-control" value="<?= $tel; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="n_academico">Nível Acadêmico</label>
                                                        <select name="n_academico" class="form-control" disabled>
                                                            <option value="alfabetização" <?php if ($n_academico == "alfabetização") echo 'selected'; ?>>Alfabetização</option>
                                                            <option value="1º Ciclo" <?php if ($n_academico == "1º Ciclo") echo 'selected'; ?>>1º Ciclo</option>
                                                            <option value="2º Ciclo" <?php if ($n_academico == "2º Ciclo") echo 'selected'; ?>>2º Ciclo</option>
                                                            <option value="Ensino Médio" <?php if ($n_academico == "Ensino Médio") echo 'selected'; ?>>Ensino Médio</option>
                                                            <option value="Licenciatura" <?php if ($n_academico == "Licenciatura") echo 'selected'; ?>>Licenciatura</option>
                                                            <option value="Mestrado" <?php if ($n_academico == "Mestrado") echo 'selected'; ?>>Mestrado</option>
                                                            <option value="Doutorado" <?php if ($n_academico == "Doutorado") echo 'selected'; ?>>Doutorado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="especialidade">Especialidade</label>
                                                        <input type="text" name="especialidade" class="form-control" value="<?= $especialidade; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="especialidade">Trabalho</label>
                                                        <input type="text" name="trabalho" class="form-control" value="<?= $trabalho; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="especialidade">Local Trabalho</label>
                                                        <input type="text" name="local_trabalho" class="form-control" value="<?= $local_trabalho; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DADOS DO PARTIDO -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Comité</label>
                                                        <select name="id_comite" class="form-control" disabled>
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="organizacao">Organização</label>
                                                        <select name="organizacao" class="form-control" disabled>
                                                            <option value="MPLA" <?php if ($organizacao == "MPLA") echo 'selected'; ?>>MPLA</option>
                                                            <option value="OMA" <?php if ($organizacao == "OMA") echo 'selected'; ?>>OMA</option>
                                                            <option value="JMPLA" <?php if ($organizacao == "JMPLA") echo 'selected'; ?>>JMPLA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">CAP</label>
                                                        <select name="id_cap" class="form-control" disabled>
                                                            <?php
                                                            foreach ($dados_cap as $dado_cap) {
                                                                $cap_tabela = $dado_cap['cap'];
                                                                $id_cap = $dado_cap['id_cap'] ?>
                                                                <option value="<?= $id_cap; ?>" <?php if ($cap_tabela == $cap) { ?> selected="selected" <?php } ?>>
                                                                    <?= $cap_tabela; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="id_cas">CAS</label>
                                                        <select name="id_cas" class="form-control" disabled>
                                                            <?php
                                                            foreach ($dados_cas as $dado_cas) {
                                                                $cas_tabela = $dado_cas['cas'];
                                                                $id_cas = $dado_cas['id_cas'] ?>
                                                                <option value="<?= $id_cas; ?>" <?php if ($cas_tabela == $cas) { ?> selected="selected" <?php } ?>>
                                                                    <?= $cas_tabela; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="d_ingresso">Data Ingresso</label>
                                                        <input type="date" name="d_ingresso" id="d_ingresso" class="form-control" value="<?= $d_ingresso; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="anos">Anos</label>
                                                        <input type="number" name="anos" id="anos" class="form-control" value="<?= $anos; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="id_funcao">Função</label>
                                                        <select name="id_funcao" class="form-control" disabled>
                                                            <?php
                                                            foreach ($dados_funcoes as $dado_funcao) {
                                                                $funcao_tabela = $dado_funcao['funcao'];
                                                                $id_funcao  = $dado_funcao['id_funcao']; ?>
                                                                <option value="<?= $id_funcao; ?>" <?php if (isset($funcao) && $funcao_tabela == $funcao) { ?> selected="selected" <?php } ?>>
                                                                    <?= $funcao_tabela; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="n_cartao">Nº Cartão</label>
                                                        <input type="text" name="n_cartao" class="form-control" value="<?= $n_cartao; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="n_cartao">Usuário</label>
                                                        <input type="text" name="id_usuario" class="form-control" value="<?= $nome; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                </button>
                                                <a href="<?= APP_URL; ?>/admin/militantes" class="btn btn-dark">
                                                    <i class="fas fa-arrow-left"></i> Voltar
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
include('../../admin/layout/rodape.php');
?>