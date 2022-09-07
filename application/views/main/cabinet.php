<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <?
                    if (isset($infoComp)):
                        $averageArray = [];
                        $averageArray2 = [];
                        foreach (json_decode($infoComp["results"], true) as $DF => $VAL) {
                            $averageArray2[$DF] = (array_sum($VAL['average']) / sizeof($VAL['average']));
                            $averageArray[$DF] = $VAL;
                        }

                        echo "<div style='padding: 1rem; margin-bottom: 1rem!important; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;'>
                            <p><b>Назва компанії: </b>$infoComp[company]</p>
                            <p><b>Дата проведення опитування: </b>$infoComp[date]</p>
                            <p><b>Логін того, хто проводив опитування: </b>$infoComp[loginname]</p>
                            <p><b>Оцінка рівня інформаційної безпеки: </b>".floor(array_sum($averageArray2) / sizeof($averageArray2))."</p>
                        </div> 
                        <canvas id='myChart'></canvas>";

                    elseif (isset($infoComp2) && is_array($infoComp2)):
                        foreach ($infoComp2 as $ID => $VALUE) {
                            if ($VALUE['company'] == "") $VALUE['company'] = $VALUE['id'];
                            echo "<div style='padding: 1rem; margin-bottom: 1rem!important; border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;'>
                                <h4><a href='/cabinet/$VALUE[id]'>$VALUE[company]</a></h4>
                                <span>Автор: $VALUE[loginname]</span><br>
                                <span>Дата создания: $VALUE[date]</span>
                            </div>";
                        }
                    else:
                        echo "<h1>Тести ще не пройдено</h1><br>";
                        echo "<a href='/createpost'>Пройти тест</a>";
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [<? 
                $localPerm = "";
                foreach ($averageArray as $DF => $VAL) {
                    $localPerm = $localPerm."'$VAL[name]',";
                }
                echo $localPerm; 
            ?>],
            datasets: [
                {
                    label: 'Середнє',
                    borderColor: 'rgba(0, 0, 0, 0.7)',
                    backgroundColor: 'rgba(0, 0, 0, 0.3)',
                    fill: true,
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(0, 0, 0, 1)',

                    data: [<? 
                        $localPerm = "";
                        foreach ($averageArray as $DF => $VAL) {
                            $aver = (array_sum($VAL['average']) / sizeof($VAL['average']));
                            $localPerm = $localPerm."'$aver',";
                        }
                        echo $localPerm; 
                    ?>],
                },
                {
                    label: 'Зона безпеки',
                    backgroundColor: 'rgba(0, 255, 0, 0.4)',
                    borderColor: 'rgba(0, 255, 0, 0.4)',
                    data: [<? 
                        $localPerm = "";
                        foreach ($averageArray as $DF => $VAL) {
                            $localPerm = $localPerm."'1.5',";
                        }
                        echo $localPerm; 
                    ?>],
                },
                {
                    label: 'Зона уваги',
                    backgroundColor: 'rgba(255, 255, 0, 0.5)',
                    borderColor: 'rgba(255, 255, 0, 0.5)',
                    data: [<? 
                        $localPerm = "";
                        foreach ($averageArray as $DF => $VAL) {
                            $localPerm = $localPerm."'3.5',";
                        }
                        echo $localPerm; 
                    ?>],
                },
                {
                    label: 'Зона небезпеки',
                    backgroundColor: 'rgba(255, 0, 0, 0.5)',
                    borderColor: 'rgba(255, 0, 0, 0.5)',
                    fill: "-1",
                    data: [<? 
                        $localPerm = "";
                        foreach ($averageArray as $DF => $VAL) {
                            $localPerm = $localPerm."'6',";
                        }
                        echo $localPerm; 
                    ?>],
                },
             ]
        },
        options: {
            maintainAspectRatio: true,
			spanGaps: false,
            scale: {
                angleLines: {
                    display: false
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 5,
                }
            },
			elements: {
				line: {
					tension: 0.000001
				}
			},
			
        },
    });
</script>