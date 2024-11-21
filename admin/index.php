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
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col sm-12">
                    <div class="content">
                        <div class="row">
                            <!--SELECIONAR O COMITE-->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-primary futuristic-box">
                                    <div class="inner">
                                        <form method="POST" action="">
                                            <label for="select_comite" class="futuristic-label">Selecione o Comitê:</label>
                                            <select id="select_comite" name="id_comite" class="form-control futuristic-select" onchange="this.form.submit()">
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
                            <style>
                                .futuristic-box {
                                    background: linear-gradient(135deg, #1f4068, #1b1b2f);
                                    border-radius: 15px;
                                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4), 0 0 10px rgba(31, 64, 104, 0.6);
                                    padding: 15px;
                                    color: #f0f0f0;
                                }

                                .futuristic-box:hover {
                                    transform: translateY(-5px);
                                    transition: 0.3s ease-in-out;
                                    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.5), 0 0 15px rgba(31, 64, 104, 0.8);
                                }

                                .futuristic-label {
                                    font-size: 1.1em;
                                    font-weight: 600;
                                    color: #f0f0f0;
                                    margin-bottom: 8px;
                                    display: block;
                                }

                                .futuristic-select {
                                    background: rgba(255, 255, 255, 0.1);
                                    border: 1px solid #444;
                                    color: #f0f0f0;
                                    border-radius: 10px;
                                    padding: 10px;
                                    font-size: 1em;
                                    box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.3);
                                    transition: 0.3s ease-in-out;
                                }

                                .futuristic-select:hover,
                                .futuristic-select:focus {
                                    border-color: #1f4068;
                                    background: rgba(31, 64, 104, 0.2);
                                    box-shadow: 0 0 10px rgba(31, 64, 104, 0.5);
                                    outline: none;
                                }
                            </style>
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
                            <div class="col-12 col-sm-6 col-md-3">
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
                                            $contador_masculino = 0;
                                            $contador_feminino = 0;
                                            if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                                $id_comite = $_POST['id_comite'];
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
                                                <font style="vertical-align: inherit;">M: <?= $contador_masculino ?></font> |
                                                <i class="fas fa-female"></i> <!-- Ícone para Feminino -->
                                                <font style="vertical-align: inherit;">F: <?= $contador_feminino ?></font>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- OMA -->
                            <div class="col-12 col-sm-6 col-md-3">
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
                            <div class="col-12 col-sm-6 col-md-3">
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
                                                <font style="vertical-align: inherit;">M: <?= $contador_masculino ?></font> |
                                                <i class="fas fa-female"></i> <!-- Ícone para Feminino -->
                                                <font style="vertical-align: inherit;">F: <?= $contador_feminino ?></font>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--CAS-->
                            <div class="col-lg-4 col-6">
                                <div class="small-box futuristic-box-2">
                                    <div class="inner">
                                        <form method="POST" action="">
                                            <label for="select_comite_2" class="futuristic-label-2">CAS</label>
                                            <select id="select_comite_2" name="id_comite" class="form-control futuristic-select-2" onchange="this.form.submit()" hidden>
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
                                        $contador_cas = 0;
                                        if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                            $id_comite = $_POST['id_comite'];
                                            $query = "SELECT COUNT(*) AS total FROM tb_cas WHERE id_comite = ?";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute([$id_comite]);
                                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $contador_cas = $resultado['total'];
                                        }
                                        ?>
                                        <h3 class="futuristic-number-2"><?= $contador_cas ?></h3>
                                        <p class="futuristic-text-2">Comitê de Acção do Sector</p>
                                    </div>
                                    <div class="icon futuristic-icon-2">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <a href="<?= APP_URL; ?>/admin/cas" class="small-box-footer futuristic-link-2">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <style>
                                .futuristic-box-2 {
                                    background: linear-gradient(135deg, #FFEB3B, #FFC107);
                                    /* Gradiente de amarelo */
                                    border-radius: 15px;
                                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4), 0 0 15px rgba(255, 193, 7, 0.6);
                                    /* Sombras com tom dourado */
                                    padding: 15px;
                                    color: #000;
                                    /* Texto em cor preta */
                                    text-align: center;
                                    position: relative;
                                    overflow: hidden;
                                }

                                .futuristic-box-2:hover {
                                    transform: translateY(-5px);
                                    transition: 0.3s ease-in-out;
                                    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.5), 0 0 20px rgba(72, 239, 50, 0.8);
                                }

                                .futuristic-label-2 {
                                    font-size: 1em;
                                    font-weight: 600;
                                    margin-bottom: 8px;
                                    color: #000;
                                    /* Cor do texto preta */
                                }

                                .futuristic-number-2 {
                                    font-size: 2.5em;
                                    font-weight: bold;
                                    color: #000;
                                    /* Cor do texto preta */
                                    margin: 15px 0;
                                }

                                .futuristic-text-2 {
                                    font-size: 1.2em;
                                    color: #000;
                                    /* Cor do texto preta */
                                }

                                .futuristic-icon-2 {
                                    font-size: 3em;
                                    color: rgba(0, 0, 0, 0.8);
                                    /* Ícone com cor escura */
                                    position: absolute;
                                    top: 15px;
                                    right: 15px;
                                }

                                .futuristic-link-2 {
                                    display: block;
                                    color: #000;
                                    /* Cor do texto preta */
                                    font-weight: bold;
                                    padding: 10px 0;
                                    text-transform: uppercase;
                                    text-decoration: none;
                                    background: rgba(0, 0, 0, 0.2);
                                    /* Link com fundo escuro */
                                    border-radius: 10px;
                                    margin-top: 10px;
                                    transition: 0.3s ease-in-out;
                                }

                                .futuristic-link-2:hover {
                                    background: rgba(0, 0, 0, 0.4);
                                    text-decoration: none;
                                    color: #000;
                                    /* Cor do texto preta ao passar o mouse */
                                }
                            </style>
                            <script>
                                document.getElementById('select_comite_2').addEventListener('change', function() {
                                    console.log('Comitê selecionado no segundo layout:', this.value);
                                });
                            </script>
                            <!--  CAPS -->
                            <div class="col-lg-4 col-6">
                                <div class="small-box futuristic-box-cap">
                                    <div class="inner">
                                        <form method="POST" action="">
                                            <label for="select_comite_cap" class="futuristic-label-cap">CAP</label>
                                            <select id="select_comite_cap" name="id_comite" class="form-control futuristic-select-cap" onchange="this.form.submit()" hidden>
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
                                        <h3 class="futuristic-number-cap"><?= $contador_cap ?></h3>
                                        <p class="futuristic-text-cap">Comité de Acção do Partido</p>
                                    </div>
                                    <div class="icon futuristic-icon-cap">
                                        <i class="fas fa-layer-group text-white"></i>
                                    </div>
                                    <a href="<?= APP_URL; ?>/admin/cap" class="small-box-footer futuristic-link-cap">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <style>
                                .futuristic-box-cap {
                                    background: linear-gradient(135deg, #000000, #333333);
                                    border-radius: 15px;
                                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4), 0 0 15px rgba(255, 255, 255, 0.2);
                                    padding: 15px;
                                    color: #ffffff;
                                    text-align: center;
                                    position: relative;
                                    overflow: hidden;
                                }

                                .futuristic-box-cap:hover {
                                    transform: translateY(-5px);
                                    transition: 0.3s ease-in-out;
                                    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.5), 0 0 20px rgba(255, 255, 255, 0.4);
                                }

                                .futuristic-label-cap {
                                    font-size: 1.1em;
                                    font-weight: 600;
                                    margin-bottom: 8px;
                                    color: #ffffff;
                                }

                                .futuristic-number-cap {
                                    font-size: 2.5em;
                                    font-weight: bold;
                                    color: #ffffff;
                                    margin: 15px 0;
                                }

                                .futuristic-text-cap {
                                    font-size: 1.2em;
                                    color: #ffffff;
                                }

                                .futuristic-icon-cap {
                                    font-size: 3em;
                                    color: rgba(255, 255, 255, 0.8);
                                    position: absolute;
                                    top: 15px;
                                    right: 15px;
                                }

                                .futuristic-link-cap {
                                    display: block;
                                    color: #ffffff;
                                    font-weight: bold;
                                    padding: 10px 0;
                                    text-transform: uppercase;
                                    text-decoration: none;
                                    background: rgba(255, 255, 255, 0.1);
                                    border-radius: 10px;
                                    margin-top: 10px;
                                    transition: 0.3s ease-in-out;
                                }

                                .futuristic-link-cap:hover {
                                    background: rgba(255, 255, 255, 0.3);
                                    text-decoration: none;
                                    color: #ffffff;
                                }
                            </style>
                            <script>
                                document.getElementById('select_comite_cap').addEventListener('change', function() {
                                    console.log('Comitê selecionado no terceiro layout:', this.value);
                                });
                            </script>
                            <!--  MILITANTES -->
                            <div class="col-lg-4 col-6">
                                <div class="small-box futuristic-box-4" style="background-color: red;">
                                    <div class="inner">
                                        <form method="POST" action="">
                                            <label for="select_comite_4" class="futuristic-label-4">Militante</label>
                                            <select id="select_comite_4" name="id_comite" class="form-control futuristic-select-4" onchange="this.form.submit()" hidden>
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
                                        $contador_militante = 0;
                                        if (isset($_POST['id_comite']) && !empty($_POST['id_comite'])) {
                                            $id_comite = $_POST['id_comite'];
                                            $query = "SELECT COUNT(*) AS total FROM tb_militantes WHERE id_comite = ?";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute([$id_comite]);
                                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                                            $contador_militante = $resultado['total'];
                                        }
                                        ?>
                                        <h3 class="futuristic-number-4"><?= $contador_militante ?></h3>
                                        <p class="futuristic-text-4">Militantes</p>
                                    </div>
                                    <div class="icon futuristic-icon-4">
                                        <i class="fas fa-users"></i> <!-- Ícone de clientes -->
                                    </div>
                                    <a href="<?= APP_URL; ?>/admin/militantes" class="small-box-footer futuristic-link-4">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <style>
                                .futuristic-box-4 {
                                    background: #d32f2f;
                                    /* Cor de fundo vermelha */
                                    border-radius: 15px;
                                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4), 0 0 15px rgba(211, 47, 47, 0.6);
                                    padding: 15px;
                                    color: #fff;
                                    text-align: center;
                                    position: relative;
                                    overflow: hidden;
                                }

                                .futuristic-box-4:hover {
                                    transform: translateY(-5px);
                                    transition: 0.3s ease-in-out;
                                    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.5), 0 0 20px rgba(211, 47, 47, 0.8);
                                }

                                .futuristic-label-4 {
                                    font-size: 1em;
                                    font-weight: 600;
                                    margin-bottom: 8px;
                                    color: #fff;
                                }

                                .futuristic-number-4 {
                                    font-size: 2.5em;
                                    font-weight: bold;
                                    color: #fff;
                                    margin: 15px 0;
                                }

                                .futuristic-text-4 {
                                    font-size: 1.2em;
                                    color: #fff;
                                }

                                .futuristic-icon-4 {
                                    font-size: 3em;
                                    color: rgba(255, 255, 255, 0.8);
                                    position: absolute;
                                    top: 15px;
                                    right: 15px;
                                }

                                .futuristic-link-4 {
                                    display: block;
                                    color: #fff;
                                    font-weight: bold;
                                    padding: 10px 0;
                                    text-transform: uppercase;
                                    text-decoration: none;
                                    background: rgba(255, 255, 255, 0.2);
                                    border-radius: 10px;
                                    margin-top: 10px;
                                    transition: 0.3s ease-in-out;
                                }

                                .futuristic-link-4:hover {
                                    background: rgba(255, 255, 255, 0.4);
                                    text-decoration: none;
                                    color: #fff;
                                }
                            </style>
                            <script>
                                document.getElementById('select_comite_4').addEventListener('change', function() {
                                    console.log('Comitê selecionado no layout Clientes:', this.value);
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/mensagens.php');
include('../admin/layout/rodape.php');
?>