<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/militantes/carregar_militante.php');
include('../app/controllers/cap/lista_cap.php');
include('../app/controllers/cas/lista_cas.php');
?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Editar Militantes</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/militantes/update.php" method="post" enctype="multipart/form-data">
                                    <input type="text" value="<?= $id_militante_get; ?>" name="id_militante" hidden>
                                    <!-- DADOS PESSOAIS -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nome Completo</label>
                                                        <input type="text" name="nome" class="form-control" value="<?= $nome; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="genero">Gênero</label>
                                                        <select name="genero" class="form-control" >
                                                            <option value="M" <?php if ($genero == "M") echo 'selected'; ?>>Masculino</option>
                                                            <option value="F" <?php if ($genero == "F") echo 'selected'; ?>>Feminino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="numero_bi">Nº do B.I</label>
                                                        <input type="text" name="bi" class="form-control" value="<?= $bi; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="provincia">Província</label>
                                                        <select name="provincia" class="form-control" >
                                                            <option value="Benguela">Benguela</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="municipios">Município</label>
                                                        <select name="municipio" class="form-control" >
                                                            <option value="Benguela" <?php if ($municipio == "Benguela") echo 'selected'; ?>>Benguela</option>
                                                            <option value="Baía Farta" <?php if ($municipio == "Baía Farta") echo 'selected'; ?>>Baía Farta</option>
                                                            <option value="Balombo" <?php if ($municipio == "Balombo") echo 'selected'; ?>>Balombo</option>
                                                            <option value="Bocoio" <?php if ($municipio == "Bocoio") echo 'selected'; ?>>Bocoio</option>
                                                            <option value="Caimbambo" <?php if ($municipio == "Caimbambo") echo 'selected'; ?>>Caimbambo</option>
                                                            <option value="Catumbela" <?php if ($municipio == "Catumbela") echo 'selected'; ?>>Catumbela</option>
                                                            <option value="Chongoroi" <?php if ($municipio == "Chongoroi") echo 'selected'; ?>>Chongoroi</option>
                                                            <option value="Cubal" <?php if ($municipio == "Cubal") echo 'selected'; ?>>Cubal</option>
                                                            <option value="Ganda" <?php if ($municipio == "Ganda") echo 'selected'; ?>>Ganda</option>
                                                            <option value="Lobito" <?php if ($municipio == "Lobito") echo 'selected'; ?>>Lobito</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Comuna</label>
                                                        <input type="text" name="comuna" class="form-control" value="<?= $comuna; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Data Nascimento</label>
                                                        <input type="date" name="d_nascimento" class="form-control" value="<?= $d_nascimento; ?>" >
                                                    </div>
                                                </div>
                                                <?php
                                                if (!empty($d_nascimento)) {
                                                    $data_nascimento = new DateTime($d_nascimento);
                                                    $data_atual = new DateTime($data_hora); // Usando a data atual da variável $data_hora
                                                    $idade = $data_atual->diff($data_nascimento)->y; // Obtém a diferença em anos
                                                } else {
                                                    $idade = ''; // Se não houver data de nascimento, deixe a idade em branco
                                                }
                                                ?>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="">Idade</label>
                                                        <input type="text" name="idade" class="form-control" value="<?= $idade; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">Residência</label>
                                                        <input type="text" name="residencia" class="form-control" value="<?= $residencia; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="telefone">Telefone</label>
                                                        <input type="number" name="tel" class="form-control" value="<?= $tel; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nivel_academico">Nível Acadêmico</label>
                                                        <select name="n_academico" class="form-control" >
                                                            <option value="Alfabetização" <?php if ($n_academico == "Alfabetização") echo 'selected'; ?>>Alfabetização</option>
                                                            <option value="1º Ciclo" <?php if ($n_academico == "1º Ciclo") echo 'selected'; ?>>1º Ciclo</option>
                                                            <option value="2º Ciclo" <?php if ($n_academico == "2º Ciclo") echo 'selected'; ?>>2º Ciclo</option>
                                                            <option value="Ensino Médio" <?php if ($n_academico == "Ensino Médio") echo 'selected'; ?>>Ensino Médio</option>
                                                            <option value="Licenciatura" <?php if ($n_academico == "Licenciatura") echo 'selected'; ?>>Licenciatura</option>
                                                            <option value="Mestrado" <?php if ($n_academico == "Mestrado") echo 'selected'; ?>>Mestrado</option>
                                                            <option value="Doutorado" <?php if ($n_academico == "Doutorado") echo 'selected'; ?>>Doutorado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Área de Formação</label>
                                                        <input type="text" name="a_formacao" class="form-control" value="<?= $a_formacao; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen</label>
                                                <input type="file" name="image" class="form-control" id="file" accept="image/jpeg, image/png">
                                                <input type="text" name="image_text" value="<?=$imagen;?>" hidden>
                                                <br>
                                                <output id="list" style="">
                                                <img src="<?= APP_URL . "/militantes/img/" . $imagen; ?>" width="150px" alt="">
                                                </output>
                                                <script>
                                                    function archivo(evt) {
                                                        var files = evt.target.files;
                                                        for (var i = 0, f; f = files[i]; i++) {
                                                            if (!f.type.match('image.*')) {
                                                                continue;
                                                            }
                                                            var reader = new FileReader();
                                                            reader.onload = (function(theFile) {
                                                                return function(e) {
                                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                };
                                                            })(f);
                                                            reader.readAsDataURL(f);
                                                        }
                                                    }
                                                    document.getElementById('file').addEventListener('change', archivo, false);
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- DADOS DO PARTIDO -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="organizacao">Organização</label>
                                                        <select name="organizacao" class="form-control">
                                                            <option value="MPLA" <?php if ($organizacao == "MPLA") echo 'selected'; ?>>MPLA</option>
                                                            <option value="OMA" <?php if ($organizacao == "OMA") echo 'selected'; ?>>OMA</option>
                                                            <option value="JMLA" <?php if ($organizacao == "JMLA") echo 'selected'; ?>>JMPLA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">CAP</label>
                                                        <div style="display:flex">
                                                            <select name="id_cap" class="form-control">
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
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">CAS</label>
                                                        <div style="display:flex">
                                                            <select name="id_cas" class="form-control">
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
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Data Ingresso</label>
                                                        <input type="date" name="d_ingresso" class="form-control" value="<?= $d_ingresso; ?>" >
                                                    </div>
                                                </div>
                                                <?php
                                                if (!empty($d_ingresso)) {
                                                    $data_ingresso = new DateTime($d_ingresso);
                                                    $data_atual = new DateTime($data_hora); // Usando a data atual da variável $data_hora
                                                    $anos = $data_atual->diff($data_ingresso)->y; // Obtém a diferença em anos
                                                } else {
                                                    $anos = ''; // Se não houver data de nascimento, deixe a idade em branco
                                                }
                                                ?>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="">Anos</label>
                                                        <input type="text" name="anos" class="form-control" value="<?= $anos; ?>" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Função</label>
                                                        <input type="text" name="funcao" class="form-control" value="<?= $funcao; ?>" >
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Nº Cartão</label>
                                                        <input type="text" name="n_cartao" class="form-control" value="<?= $n_cartao; ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-dark">
                                                    <i class="fas fa-sync-alt"></i> Actualizar
                                                </button>
                                                <a href="<?= APP_URL; ?>/militantes" class="btn btn-dark">
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