<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' .
     DIRECTORY_SEPARATOR . 'Highchart.php';

$chart = new Highchart(Highchart::HIGHSTOCK);

$chart->chart->renderTo = "container";
$chart->rangeSelector->selected = 2;
$chart->title->text = "AAPL Stock Price";

$chart->series[] = array(
    'name' => "AAPL Stock Price",
    'data' => new HighchartJsExpr("data"),
    'lineWidth' => 0,
    'marker' => array(
        'enabled' => 1,
        'radius' => 2
    ),
    'tooltip' => array(
        'valueDecimals' => 2
    )
);
?>

<html>
    <head>
        <title>Point markers only</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php
        foreach ($chart->getScripts() as $script) {
            echo '<script type="text/javascript" src="' . $script . '"></script>';
        }
        ?>
    </head>
    <body>
        <div id="container"></div>
        <script type="text/javascript">
            $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function(data) {
                <?php echo $chart->render("chart"); ?>;
            });
        </script>
    </body>
</html>