<div class="links box">
    <h1><span class="icon">t</span>Statistiques</h1>

</div>

<?= Func::getFlash() ?>

<div class="stat">

    <h2>Les dérniers 6 mois</h2>

    <div class="flex numbers">

        <a href="orders.php" class="box b-b">
            <span class="icon">I</span>
            <span class="number"><?= $commandes->nbr ?></span>
            <span class="title">Commandes</span>
        </a>

        <a href="utilisateurs.php" class="box b-g">
            <span class="icon">+</span>
            <span class="number"><?= $users->nbr ?></span>
            <span class="title">Membres</span>
        </a>

        <a href="orders.php?stt=2" class="box b-r">
            <span class="icon">B</span>
            <span class="number"><?= number_format($binifits[0]->nbr ,0 , ' ', ' ')?><span class="da">DA</span></span>
            <span class="title">Gains</span>
        </a>

    </div>

    <div class="flex numbers">

        <div class="box">
            <canvas id="commandes_box" width="400" height="300"></canvas>
        </div>

        <div class="box">
            <canvas id="users_box" width="400" height="300"></canvas>
        </div>

        <div class="box">
            <canvas id="binifits_box" width="400" height="300"></canvas>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var commandes = document.getElementById('commandes_box').getContext('2d');
    var myChart = new Chart(commandes, {
        type: 'bar',
        data: {
            labels: [<?php

             foreach($commandes_value AS $k => $b){

                echo "'$k',";

            }

             ?>],
            datasets: [{
                label: '# Commandes',
                data: [<?php

             foreach($commandes_value AS $k => $b){

                echo "'$b',";

            }

             ?>],
                backgroundColor: [
                    '#4361ee'
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

    var users = document.getElementById('users_box').getContext('2d');
    var myChart = new Chart(users, {
        type: 'bar',
        data: {
            labels: [<?php

             foreach($users_value AS $k => $b){

                echo "'$k',";

            }

             ?>],
            datasets: [{
                label: '# Membres',
                data: [<?php

             foreach($users_value AS $k => $b){

                echo "'$b',";

            }

             ?>],
                backgroundColor: [
                    '#11998e'
                ],
                borderColor: [
                    '#11998e'
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

    var binifits = document.getElementById('binifits_box').getContext('2d');
    var myChart = new Chart(binifits, {
        type: 'line',
        data: {
            labels: [<?php

             foreach($binifits_value AS $k => $b){

                echo "'$k',";

            }

             ?>],
            datasets: [{
                label: '# Gains',
                data: [<?php

             foreach($binifits_value AS $k => $b){

                echo "'$b',";

            }

             ?>],
                backgroundColor: [
                    '#ef4043'
                ],
                borderColor: [
                    '#ef4043'
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
</script>