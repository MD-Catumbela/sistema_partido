<?php
include('../app/config.php');
include('../admin/layout/sessao.php');
include('../admin/layout/cabecalho.php');
include('../app/controllers/usuarios/lista_usuarios.php');
include('../app/controllers/niveis/lista_niveis.php');
include('../app/controllers/cas/lista_cas.php');
include('../app/controllers/cap/lista_cap.php');
include('../app/controllers/funcoes/lista_funcoes.php');
include('../app/controllers/militantes/lista_militantes.php');
include('../app/controllers/comites/lista_comite.php');
?>
<!-- CORPO DO CODIGO -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col sm-12">
                    <div class="content">
                        <!-- QUANTIDADE -->
                        <div class="row">
                            <!--PESQUISA -->
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-dark">
                                    <div class="inner">
                                        <!-- Formulário de seleção de comitê -->
                                        <form method="POST" action="">
                                            <label for="select_comite">Selecione o Comitê:</label>
                                            <select id="select_comite" name="id_comite" class="form-control" onchange="this.form.submit()">
                                                <option value="">Escolha um comitê</option>
                                                <?php foreach ($dados_comites as $dado_comite): ?>
                                                    <option value="<?= $dado_comite['id_comite'] ?>"
                                                        <?= isset($_POST['id_comite']) && $_POST['id_comite'] == $dado_comite['id_comite'] ? 'selected' : '' ?>>
                                                        <?= $dado_comite['comite'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                    </div>                                 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- CAP -->
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <!-- Formulário de seleção de comitê -->
                                        <form method="POST" action="">
                                            <label for="select_comite">Comitê de Acção do Sector</label>
                                            <select id="select_comite" name="id_comite" class="form-control" onchange="this.form.submit()" hidden>
                                                <option value="">Escolha um comitê</option>
                                                <?php foreach ($dados_comites as $dado_comite): ?>
                                                    <option value="<?= $dado_comite['id_comite'] ?>"
                                                        <?= isset($_POST['id_comite']) && $_POST['id_comite'] == $dado_comite['id_comite'] ? 'selected' : '' ?>>
                                                        <?= $dado_comite['comite'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                        <?php
                                        // Contagem de registros para o comitê selecionado
                                        $contador_cas = 0;
                                        if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                            $id_comite = $_POST['id_comite'];
                                            // Consulta SQL para contar os registros na tabela tb_cas para o comitê selecionado
                                            $query = "SELECT COUNT(*) AS total FROM tb_cas WHERE id_comite = ?";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute([$id_comite]);
                                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $contador_cas = $resultado['total'];
                                        }
                                        ?>
                                        <!-- Exibição da contagem -->
                                        <h3><?= $contador_cas ?></h3>
                                        <p>CAS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <!-- Link para mais informações -->
                                    <a href="<?= APP_URL; ?>/admin/cas" class="small-box-footer">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!--  CAPS -->
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-black">
                                    <div class="inner">
                                        <!-- Formulário de seleção de comitê -->
                                        <form method="POST" action="">
                                            <label for="select_comite_cap">Comité de Acção do Partido</label>
                                            <select id="select_comite_cap" name="id_comite" class="form-control" onchange="this.form.submit()" hidden>
                                                <option value="">Escolha um comitê</option>
                                                <?php foreach ($dados_comites as $dado_comite): ?>
                                                    <option value="<?= $dado_comite['id_comite'] ?>"
                                                        <?= isset($_POST['id_comite']) && $_POST['id_comite'] == $dado_comite['id_comite'] ? 'selected' : '' ?>>
                                                        <?= $dado_comite['comite'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                        <?php
                                        // Contagem de registros "CAP" para o comitê selecionado
                                        $contador_cap = 0;
                                        if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                            $id_comite = $_POST['id_comite'];

                                            // Consulta SQL para contar os registros de "CAP" na tabela tb_cap para o comitê selecionado
                                            $query = "SELECT COUNT(*) AS total FROM tb_caps WHERE id_comite = ?";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute([$id_comite]);
                                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $contador_cap = $resultado['total'];
                                        }
                                        ?>
                                        <!-- Exibição da contagem -->
                                        <h3><?= $contador_cap ?></h3>
                                        <p>CAP</p>
                                    </div>

                                    <div class="icon">
                                        <i class="fas fa-layer-group text-white"></i>
                                    </div>

                                    <!-- Link para mais informações -->
                                    <a href="<?= APP_URL; ?>/admin/cap" class="small-box-footer">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!--  MILITANTES -->
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <!-- Formulário de seleção de comitê -->
                                        <form method="POST" action="">
                                            <label for="select_comite_militante">Militantes do Partido</label>
                                            <select id="select_comite_militante" name="id_comite" class="form-control" onchange="this.form.submit()" hidden>
                                                <option value="">Escolha um comitê</option>
                                                <?php foreach ($dados_comites as $dado_comite): ?>
                                                    <option value="<?= $dado_comite['id_comite'] ?>"
                                                        <?= isset($_POST['id_comite']) && $_POST['id_comite'] == $dado_comite['id_comite'] ? 'selected' : '' ?>>
                                                        <?= $dado_comite['comite'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                        <?php
                                        // Contagem de militantes para o comitê selecionado
                                        $contador_militante = 0;
                                        if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                            $id_comite = $_POST['id_comite'];

                                            // Consulta SQL para contar os militantes associados ao comitê selecionado
                                            $query = "SELECT COUNT(*) AS total FROM tb_militantes WHERE id_comite = ?";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute([$id_comite]);
                                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $contador_militante = $resultado['total'];
                                        }
                                        ?>
                                        <!-- Exibição da contagem -->
                                        <h3><?= $contador_militante ?></h3>
                                        <p>Militantes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                    <!-- Link para mais informações -->
                                    <a href="<?= APP_URL; ?>/admin/militantes" class="small-box-footer">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <!--  RESERVA -->
                        <div class="row">

                            <!-- XXXXX-->

                            <!-- MPLA-->
                            <form method="POST" action="">
                                <label for="select_comite"></label>
                                <select id="select_comite" name="id_comite" class="form-control" onchange="this.form.submit()" hidden>
                                    <option value="">Escolha um comitê</option>
                                    <?php foreach ($dados_comites as $dado_comite): ?>
                                        <option value="<?= $dado_comite['id_comite'] ?>" <?= isset($_POST['id_comite']) && $_POST['id_comite'] == $dado_comite['id_comite'] ? 'selected' : '' ?>>
                                            <?= $dado_comite['comite'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                            <!-- Exibição de Militantes por Comitê -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box mb-3">
                                    <img src="<?= APP_URL; ?>/public/img/mpla.jpg" alt="JMPLA" class="brand-image img-circle elevation-3" style="opacity: .8, width: 100px; height: 100px;">
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Total de Militantes</font>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            // Inicializando os contadores
                                            $contador_masculino = 0;
                                            $contador_feminino = 0;

                                            // Verificando se o filtro de comitê está ativo
                                            if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                                $id_comite = $_POST['id_comite'];

                                                // Consulta para filtrar militantes por comitê
                                                foreach ($dados_militantes as $dado_militante) {
                                                    if ($dado_militante['id_comite'] == $id_comite) {
                                                        if ($dado_militante['genero'] == 'M') {
                                                            $contador_masculino++;
                                                        } elseif ($dado_militante['genero'] == 'F') {
                                                            $contador_feminino++;
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    <?= $contador_masculino + $contador_feminino ?> Militantes
                                                </font>
                                            </font>
                                        </span>
                                        <div>
                                            <font style="vertical-align: inherit;">
                                                <i class="fas fa-male"></i> <!-- Ícone para Masculino -->
                                                <font style="vertical-align: inherit;">Mas: <?= $contador_masculino ?></font> |
                                                <i class="fas fa-female"></i> <!-- Ícone para Feminino -->
                                                <font style="vertical-align: inherit;">Fem: <?= $contador_feminino ?></font>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- OMA -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box mb-3">
                                    <img src="<?= APP_URL; ?>/public/img/oma.png" alt="OMA" class="brand-image img-circle elevation-3" style="opacity: .8, width: 110px; height: 100px;">

                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">OMA</font>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            // Contagem de militantes da OMA para o comitê selecionado
                                            $contador_oma = 0;
                                            if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                                $id_comite = $_POST['id_comite'];

                                                // Consulta para contar militantes da organização OMA para o comitê selecionado
                                                $query = "SELECT COUNT(*) AS total FROM tb_militantes WHERE id_comite = ? AND organizacao = 'OMA'";
                                                $stmt = $pdo->prepare($query);
                                                $stmt->execute([$id_comite]);
                                                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                                $contador_oma = $resultado['total'];
                                            }
                                            ?>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><?= $contador_oma ?> Militantes</font>
                                            </font>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- JMPLA -->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box mb-3">
                                    <img src="<?= APP_URL; ?>/public/img/jmpla.png" alt="JMPLA" class="brand-image img-circle elevation-3" style="opacity: .8, width: 100px; height: 100px;">
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">JMPLA</font>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            // Inicializando os contadores
                                            $contador_jmpla = 0;
                                            $contador_masculino = 0;
                                            $contador_feminino = 0;

                                            // Verifica se o id_comite foi enviado via POST
                                            if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                                $id_comite = $_POST['id_comite'];

                                                // Consulta para contar militantes da organização JMPLA para o comitê selecionado
                                                $query = "SELECT COUNT(*) AS total, 
                                     SUM(CASE WHEN genero = 'M' THEN 1 ELSE 0 END) AS masculino, 
                                     SUM(CASE WHEN genero = 'F' THEN 1 ELSE 0 END) AS feminino
                              FROM tb_militantes 
                              WHERE id_comite = ? AND organizacao = 'JMPLA'";

                                                // Prepara a consulta SQL
                                                $stmt = $pdo->prepare($query);
                                                $stmt->execute([$id_comite]);
                                                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                                                // Atribui os resultados aos contadores
                                                $contador_jmpla = $resultado['total'];
                                                $contador_masculino = $resultado['masculino'];
                                                $contador_feminino = $resultado['feminino'];
                                            }
                                            ?>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><?= $contador_jmpla ?> Militantes</font>
                                            </font>
                                        </span>
                                        <div>
                                            <font style="vertical-align: inherit;">
                                                <i class="fas fa-male"></i> <!-- Ícone para Masculino -->
                                                <font style="vertical-align: inherit;">Mas: <?= $contador_masculino ?></font> |
                                                <i class="fas fa-female"></i> <!-- Ícone para Feminino -->
                                                <font style="vertical-align: inherit;">Fem: <?= $contador_feminino ?></font>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- XXXXX-->




                            <!--AA-->


                            <!-- Filtro de Comitê -->



                            <!--AA-->
                        </div>

                        <!--SECTORES-->




                        <!--AA-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<!-- FIM CORPO DO CODIGO -->
<?php
include('../layout/mensagens.php');
include('../admin/layout/rodape.php');
?>