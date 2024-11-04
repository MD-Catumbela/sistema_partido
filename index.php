<?php
include('app/config.php');
include('layout/sessao.php');
include('layout/cabecalho.php');
include('app/controllers/usuarios/lista_usuarios.php');
include('app/controllers/niveis/lista_niveis.php');
include('app/controllers/cas/lista_cas.php');
include('app/controllers/cap/lista_cap.php');
include('app/controllers/funcoes/lista_funcoes.php');
include('app/controllers/militantes/lista_militantes.php');
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
                            <!--  CAS -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <?php
                                        $contador_cas = 0;
                                        foreach ($dados_cas as $dado_cas) {
                                            $contador_cas = $contador_cas + 1;
                                        }
                                        ?>
                                        <h3><?= $contador_cas ?></h3>
                                        <p>CAS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <a href="<?= APP_URL; ?>/cas" class="small-box-footer">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!--  CAPS -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-black">
                                    <div class="inner">
                                        <?php
                                        $contador_cap = 0;
                                        foreach ($dados_cap as $dado_cap) {
                                            $contador_cap = $contador_cap + 1;
                                        }
                                        ?>
                                        <h3><?= $contador_cap ?></h3>
                                        <p>CAP</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-layer-group text-white"></i>
                                    </div>
                                    <a href="<?= APP_URL; ?>/cap" class="small-box-footer">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!--  MILITANTES -->
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <?php
                                        $contador_militante = 0;
                                        foreach ($dados_militantes as $dado_militante) {
                                            $contador_militante = $contador_militante + 1;
                                        }
                                        ?>
                                        <h3><?= $contador_militante ?></h3>
                                        <p>Militantes</p>
                                    </div>
                                    <div class="icon">
                                        <i class=" fas fa-users text-white"></i>
                                    </div>
                                    <a href="<?= APP_URL; ?>/militantes" class="small-box-footer">
                                        Mais informações <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <!--  RESERVA -->
                        <div class="row">
                            <!-- MPLA-->
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="info-box">
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
                                            foreach ($dados_militantes as $dado_militante) {
                                                if ($dado_militante['genero'] == 'M') {
                                                    $contador_masculino++;
                                                } elseif ($dado_militante['genero'] == 'F') {
                                                    $contador_feminino++;
                                                }
                                            }
                                            ?>
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
                                    <img src="<?= APP_URL; ?>/public/img/oma.png" alt="JMPLA" class="brand-image img-circle elevation-3" style="opacity: .8, width: 110px; height: 100px;">
                                    <div class="info-box-content">
                                        <span class="info-box-text">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">OMA</font>
                                            </font>
                                        </span>
                                        <span class="info-box-number">
                                            <?php
                                            $contador_oma = 0;
                                            foreach ($dados_militantes as $dado_produto) {
                                                if ($dado_produto['organizacao'] == 'OMA') {
                                                    $contador_oma++;
                                                }
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
                                            $contador_jmpla = 0;
                                            $contador_masculino = 0;
                                            $contador_feminino = 0;
                                            foreach ($dados_militantes as $dado_produto) {
                                                if ($dado_produto['organizacao'] == 'JMPLA') {
                                                    $contador_jmpla++;
                                                    if ($dado_produto['genero'] == 'Masculino') {
                                                        $contador_masculino++;
                                                    } elseif ($dado_produto['genero'] == 'Feminino') {
                                                        $contador_feminino++;
                                                    }
                                                }
                                            }
                                            ?>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><?= $contador_jmpla ?> Militantes</font>
                                            </font>
                                        </span>
                                        <div>
                                            <font style="vertical-align: inherit;">
                                                <i class="fas fa-male"></i>
                                                <font style="vertical-align: inherit;">Mas: <?= $contador_masculino ?></font> |
                                                <i class="fas fa-female"></i>
                                                <font style="vertical-align: inherit;">Fem: <?= $contador_feminino ?></font>
                                            </font>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--AA-->


                            <!--AA-->
                        </div>

                        <!--SECTORES-->
                        <?php
                        // Contadores por setor
                        $setores = ['SECTOR 1', 'SECTOR 2', 'SECTOR 3', 'SECTOR 4', 'SECTOR 5', 'SECTOR 6', 'SECTOR 7', 'SECTOR 8', 'SECTOR 9', 'SECTOR 10'];
                        $contadores_setores = array_fill_keys($setores, 0);

                        foreach ($dados_militantes as $dado_produto) {
                            if (in_array($dado_produto['cas'], $setores)) {
                                $contadores_setores[$dado_produto['cas']]++;
                            }
                        }
                        ?>
                        <!-- Gráfico de Militantes por Setor -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="militantesChart" style="height: 100%; width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--AA-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluindo a biblioteca Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Dados dos setores
    const setores = <?= json_encode(array_keys($contadores_setores)) ?>;
    const contadoresSetores = <?= json_encode(array_values($contadores_setores)) ?>;

    // Dados para o gráfico
    const data = {
        labels: setores,
        datasets: [{
            label: 'Militantes por Setor',
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#FF9F40', '#66BB6A', '#9575CD', '#29B6F6', '#FF7043', '#8D6E63'],
            data: contadoresSetores,
            // Aumentando a profundidade das barras para simular um efeito 3D
            barThickness: 30,
        }]
    };

    // Configuração do gráfico
    const config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Distribuição de Militantes por Setores'
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            },
        },
    };

    const militantesChart = new Chart(
        document.getElementById('militantesChart'),
        config
    );
</script>




<!-- FIM CORPO DO CODIGO -->
<?php
include('layout/mensagens.php');
include('layout/rodape.php');
?>