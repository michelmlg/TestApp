<div class="mt-4 p-3 shadow-sm bg-white border" style="border-radius: 10px;">
    <h5><i class="fa-solid fa-chart-line"></i> Cotação</h5>

    <?php
    // Gerar os dados para o gráfico com base no histórico
    $labels = [];
    $dataOpen = [];
    $dataHigh = [];
    $dataLow = [];
    $dataClose = [];

    foreach ($historico as $dia) {
        $labels[] = date('d/m/Y', $dia['date']);
        $dataOpen[] = $dia['open'];
        $dataHigh[] = $dia['high'];
        $dataLow[] = $dia['low'];
        $dataClose[] = $dia['close'];
    }
    ?>

    <canvas id="myChart"></canvas>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        const labels = <?= json_encode($labels) ?>;
        const dataOpen = <?= json_encode($dataOpen) ?>;
        const dataHigh = <?= json_encode($dataHigh) ?>;
        const dataLow = <?= json_encode($dataLow) ?>;
        const dataClose = <?= json_encode($dataClose) ?>;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [ 
                    {
                        label: 'Valor diário',
                        data: dataClose,
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderWidth: 1,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return 'R$ ' + context.raw.toFixed(2).replace('.', ',');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function (value) {
                                return 'R$ ' + value.toFixed(2).replace('.', ',');
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>
