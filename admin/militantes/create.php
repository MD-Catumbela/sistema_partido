<?php
include('../../app/config.php');
include('../../admin/layout/sessao.php');
include('../../admin/layout/cabecalho.php');
include('../../app/controllers/cap/lista_cap.php');
include('../../app/controllers/cas/lista_cas.php');
include('../../app/controllers/funcoes/lista_funcoes.php');
include('../../app/controllers/comites/lista_comite.php');
?>
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md">
                        <div class="card card-primary">
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
                                                        <label for="nome">Nome Completo</label>
                                                        <input type="text" name="nome_mi" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nome_pai">Nome do Pai</label>
                                                        <input type="text" name="nome_pai" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nome_mae">Nome da Mãe</label>
                                                        <input type="text" name="nome_mae" class="form-control">
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
                                                        <label for="bi">Nº do B.I</label>
                                                        <input type="text" name="bi" class="form-control" required maxlength="14" pattern=".{14}" title="O número do B.I deve ter exatamente 14 dígitos">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="d_nascimento">Data Nascimento</label>
                                                        <input type="date" name="d_nascimento" id="d_nascimento" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="idade">Idade</label>
                                                        <input type="number" name="idade" id="idade" class="form-control" required readonly>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.getElementById("d_nascimento").addEventListener("change", function() {
                                                        const dataNascimento = new Date(this.value);
                                                        const dataAtual = new Date();

                                                        let idade = dataAtual.getFullYear() - dataNascimento.getFullYear();

                                                        // Ajuste se a data atual ainda não passou o aniversário deste ano
                                                        if (dataAtual.getMonth() < dataNascimento.getMonth() ||
                                                            (dataAtual.getMonth() === dataNascimento.getMonth() && dataAtual.getDate() < dataNascimento.getDate())) {
                                                            idade--;
                                                        }

                                                        document.getElementById("idade").value = idade >= 0 ? idade : 0;
                                                    });
                                                </script>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="endereco">Residência</label>
                                                        <input type="text" name="endereco" class="form-control">
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
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="tel">Telefone</label>
                                                        <input type="number" name="tel" class="form-control" required minlength="9" maxlength="9" oninput="if(this.value.length > 9) this.value = this.value.slice(0, 9);">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="n_academico">Nível Acadêmico</label>
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
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="especialidade">Especialidade</label>
                                                        <input type="text" name="especialidade" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="especialidade">Trabalho</label>
                                                        <input type="text" name="trabalho" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="especialidade">Local Trabalho</label>
                                                        <input type="text" name="local_trabalho" class="form-control">
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
                                                        <label for="id_comite">Comité</label>
                                                        <select name="id_comite" class="form-control">
                                                            <?php foreach ($dados_comites as $dado_comite) { ?>
                                                                <option value="<?= $dado_comite['id_comite'] ?>"><?= $dado_comite['comite'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="organizacao">Organização</label>
                                                        <select name="organizacao" class="form-control">
                                                            <option value="MPLA">MPLA</option>
                                                            <option value="OMA">OMA</option>
                                                            <option value="JMPLA">JMPLA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="id_cap">CAP</label>
                                                        <select name="id_cap" class="form-control">
                                                            <?php foreach ($dados_cap as $dado_cap) { ?>
                                                                <option value="<?= $dado_cap['id_cap'] ?>"><?= $dado_cap['cap'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="id_cas">CAS</label>
                                                        <select name="id_cas" class="form-control">
                                                            <?php foreach ($dados_cas as $dado_cas) { ?>
                                                                <option value="<?= $dado_cas['id_cas'] ?>"><?= $dado_cas['cas'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="d_ingresso">Data Ingresso</label>
                                                        <input type="date" name="d_ingresso" id="d_ingresso" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="anos">Anos</label>
                                                        <input type="number" name="anos" id="anos" class="form-control" required readonly>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.getElementById("d_ingresso").addEventListener("change", function() {
                                                        const dataIngresso = new Date(this.value);
                                                        const dataAtual = new Date();

                                                        let anos = dataAtual.getFullYear() - dataIngresso.getFullYear();

                                                        // Ajusta se o ano de ingresso ainda não chegou neste ano
                                                        if (dataAtual.getMonth() < dataIngresso.getMonth() ||
                                                            (dataAtual.getMonth() === dataIngresso.getMonth() && dataAtual.getDate() < dataIngresso.getDate())) {
                                                            anos--;
                                                        }

                                                        document.getElementById("anos").value = anos >= 0 ? anos : 0;
                                                    });
                                                </script>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="id_funcao">Função</label>
                                                        <select name="id_funcao" class="form-control">
                                                            <?php foreach ($dados_funcoes as $dado_funcao) { ?>
                                                                <option value="<?= $dado_funcao['id_funcao'] ?>"><?= $dado_funcao['funcao'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="n_cartao">Nº Cartão</label>
                                                        <input type="text" name="n_cartao" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="n_cartao">Usuário</label>
                                                        <input type="text" name="id_usuario" class="form-control" value="<?= $nome; ?>" readonly>
                                                        <!-- Campo oculto para enviar o id_usuario ao controlador -->
                                                        <input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
                                                    </div>
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
                                                <a href="<?= APP_URL; ?>/admin/militantes" class="btn btn-danger">
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