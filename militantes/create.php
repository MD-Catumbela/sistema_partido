<?php
include('../app/config.php');
include('../layout/sessao.php');
include('../layout/cabecalho.php');
include('../app/controllers/cap/lista_cap.php');
include('../app/controllers/cas/lista_cas.php');
?>

<!-- CORPO DO CODIGO -->
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><b>Adicionar Militante</b></h3>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form action="<?= APP_URL; ?>/app/controllers/militantes/create.php" method="post" enctype="multipart/form-data">
                                    <!-- DADOS PESSOAIS -->
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nome Completo</label>
                                                        <input type="text" name="nome" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="genero">Gênero</label>
                                                        <select name="genero" class="form-control">
                                                            <option value="M">Masculino</option>
                                                            <option value="F">Feminino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="numero_bi">Nº do B.I</label>
                                                        <input type="text" name="bi" class="form-control" required maxlength="14"
                                                            pattern=".{14}" title="O número do B.I deve ter exatamente 14 dígitos">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="provincia">Província</label>
                                                        <select name="provincia" class="form-control">
                                                            <option value="Benguela">Benguela</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="municipios">Município</label>
                                                        <select name="municipio" class="form-control">
                                                            <option value="Benguela">Benguela</option>
                                                            <option value="Baía Farta">Baía Farta</option>
                                                            <option value="Balombo">Balombo</option>
                                                            <option value="Bocoio">Bocoio</option>
                                                            <option value="Caimbambo">Caimbambo</option>
                                                            <option value="Catumbela">Catumbela</option>
                                                            <option value="Chongoroi">Chongoroi</option>
                                                            <option value="Cubal">Cubal</option>
                                                            <option value="Ganda">Ganda</option>
                                                            <option value="Lobito">Lobito</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Comuna</label>
                                                        <input type="text" name="comuna" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Data Nascimento</label>
                                                        <input type="date" name="d_nascimento" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Residência</label>
                                                        <input type="text" name="residencia" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="telefone">Telefone</label>
                                                        <input type="number" name="tel" class="form-control" required minlength="9" maxlength="9"
                                                            oninput="if(this.value.length > 9) this.value = this.value.slice(0, 9);">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nivel_academico">Nível Acadêmico</label>
                                                        <select name="n_academico" class="form-control">
                                                            <option value="alfabetização">Alfabetização</option>
                                                            <option value="1º Ciclo">1º Ciclo</option>
                                                            <option value="2º Ciclo">2º Ciclo</option>
                                                            <option value="Ensino Médio">Ensino Médio</option>
                                                            <option value="Licenciatura">Licenciatura</option>
                                                            <option value="Mestrado">Mestrado</option>
                                                            <option value="Doutorado">Doutorado</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Área de Formação</label>
                                                        <input type="text" name="a_formacao" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen</label>
                                                <input type="file" name="image" class="form-control" id="file" accept="image/jpeg, image/png">
                                                <br>
                                                <output id="list"></output>
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
                                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="150px" title="', escape(theFile.name), '"/>'].join('');
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
                                                            <option value="MPLA">MPLA</option>
                                                            <option value="OMA">OMA</option>
                                                            <option value="JMLA">JMPLA</option>
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">CAP</label>
                                                        <div style="display:flex">
                                                            <select name="id_cap" class="form-control">
                                                                <?php
                                                                foreach ($dados_cap as $dado_cap) { ?>
                                                                    <option value="<?= $dado_cap['id_cap'] ?>"><?= $dado_cap['cap'] ?></option>
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
                                                                foreach ($dados_cas as $dado_cas) { ?>
                                                                    <option value="<?= $dado_cas['id_cas'] ?>"><?= $dado_cas['cas'] ?></option>
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
                                                        <input type="date" name="d_ingresso" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Função</label>
                                                        <input type="text" name="funcao" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Nº Cartão</label>
                                                        <input type="text" name="n_cartao" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-dark">
                                                    <i class="fas fa-save"></i> Registrar
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