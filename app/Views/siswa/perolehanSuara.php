<?= $this->extend('siswa/template_siswa'); ?>

<?= $this->section('page-siswa'); ?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-12 mt-2">
            <h1 class="text-center text-info">Perolehan Suara</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-6 mr-5 shadow">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-3 ml-5 shadow text-center ">
            <canvas id="chartPemilihan"></canvas>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js'></script>
    <script>
        let jml_data = <?= $jml_kandidat ?>;
        let kandidat = [];
        let perolehanSuara = [];
        <?php foreach ($nama_kandidat as $key => $value) : ?>
            kandidat.push('<?= $value['nama_kandidat'] ?>');
        <?php endforeach ?>
        <?php foreach ($banyak_suara as $key => $value) : ?>
            perolehanSuara.push('<?= $value['no_urut'] ?>');
        <?php endforeach ?>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: kandidat,
                datasets: [{
                    label: 'Jumlah Perhitungan Suara',
                    data: perolehanSuara,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        const chartP = document.getElementById('chartPemilihan').getContext('2d');
        const chartPemilihan = new Chart(chartP, {
            type: 'doughnut',
            data: {
                labels: ['Sudah Memilih', 'Belum Memilih' ],
                datasets: [{
                    label: 'Jumlah Perhitungan Suara',
                    data: [ <?= $sudah ?>, <?= $belum ?>  ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],

                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    labels: {
                        boxWidth: 15
                    }
                }
            }
        });
    </script>
</div>

<?= $this->endSection(); ?>