<?php

$randomDatas1 = "";
$randomDatas2 = "";
$randomDatas3 = "";
$randomDatas4 = "";
$randomDatas5 = "";

for ($i = 0; $i < 7; $i++) {
    $random1 = rand(0, 100);
    $random2 = rand(0, 100);
    $random3 = rand(0, 100);
    $random4 = rand(0, 100);
    $random5 = rand(0, 100);


    if ($i == 6) {
        $randomDatas1 .= $random1;
        $randomDatas2 .= $random2;
        $randomDatas3 .= $random3;
        $randomDatas4 .= $random4;
        $randomDatas5 .= $random5;
    } else {
        $randomDatas1 .= $random1 .= ",";
        $randomDatas2 .= $random2 .= ",";
        $randomDatas3 .= $random3 .= ",";
        $randomDatas4 .= $random4 .= ",";
        $randomDatas5 .= $random5 .= ",";
    }
}

// var_dump(($randomDatas));
// var_dump(($randomDatas2));
// var_dump(($randomDatas3));
// var_dump(($randomDatas4));
// var_dump(($randomDatas5));


?>


<html>

<head>
    <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
</head>

<body>
    <canvas id="canvas" style="max-width:600px"></canvas>
    <script>
        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'My First dataset',
                    borderColor: 'red',
                    backgroundColor: 'red',
                    data: [
                        //25, 30, 27, 40, 43
                        <?=
                        $randomDatas1;
                        ?>
                    ],
                    fill: false,
                }, {
                    label: 'My Second dataset',
                    fill: false,
                    borderColor: 'blue',
                    backgroundColor: 'blue',
                    data: [
                        //8, 50, 19, 45, 35
                        <?=
                        $randomDatas2;
                        ?>
                    ],
                }, {
                    label: 'My Third dataset',
                    fill: false,
                    borderColor: 'green',
                    backgroundColor: 'green',
                    data: [
                        <?=
                        $randomDatas3;
                        ?>
                    ],
                }, {
                    label: 'My Fourth dataset',
                    fill: false,
                    borderColor: 'yellow',
                    backgroundColor: 'yellow',
                    data: [
                        <?=
                        $randomDatas4;
                        ?>
                    ],
                }, {
                    label: 'My Fifth dataset',
                    fill: false,
                    borderColor: 'brown',
                    backgroundColor: 'brown',
                    data: [
                        <?=
                        $randomDatas5;
                        ?>
                    ],
                }]
            }
        };
        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };
    </script>
</body>

</html>