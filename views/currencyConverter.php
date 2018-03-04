<?php  if(!isset($_SESSION['isauth'])) header("location:/currencyConverter/controllers/AuthenticationController.php?action=login");
 @include '../chart.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">

    <link href="../assets/css/style.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php  echo $dt;?>);

          /*  var options = {
                title: 'Company Performance',
                hAxis: {title: 'Day',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));
*/
            var options = {
                title: 'Currency last month',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>

<div class="container convert">
    <h1 class="convert-text" align="center">Currency Converter</h1>
    <a    href="/currencyConverter/controllers/AuthenticationController.php?action=deconn"><button >Log out</button></a>
    <form role="form" action="../controllers/ConverterController.php?action=convert" method="post">
    <input type="hidden" name="directionButton" id="directionButton"/>
    <h2 id="fromto"><span class="from"><?php if(isset($curencyFrom)) echo $curencyFrom; else echo 'AUD';?></span>/<span class="to"><?php if(isset($curencyTo)) echo $curencyTo; else echo 'AUD';?></span></h2>
        <div class="row">
            <div class="col-md-5">
                <label for="currency1">Currency I Have:</label>
                <div class="form-group">
                    <select id="currency1" name="curencyFrom" class=" form-control" >
                        <?php foreach($currencies['string'] as $currency){  ?>
                            <option  value="<?php echo $currency; ?>" <?php if(isset($curencyFrom) && $curencyFrom==$currency) echo 'selected';?>><?php echo $currency; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <label class="text-left" for="currency2">Currency I Want:</label>
                <div class="form-group">
                    <select id="currency2" name="curencyTo" class="form-control">
                        <?php foreach($currencies['string'] as $currency){ ?>
                            <option  value="<?php echo $currency; ?>" <?php if(isset($curencyTo) && $curencyTo==$currency) echo 'selected';?>><?php echo $currency; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-1">
                <div class="form-group">
                    <button type="submit" name="button" value="left"><span class="glyphicon glyphicon-chevron-left"></span></button>
                    <button type="submit" name="button" value="right"><span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </div>
            <div class="col-md-5"></div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="amount1">AMOUNT:</label>
                    <div class="input-group">
                        <input id="amount1" type="number" name="numberFrom" class="form-control" aria-label="Amount of first currency" value="<?php if(isset($numberFrom)) echo $numberFrom;?>">
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="amount2">AMOUNT:</label>

                    <div class="input-group">
                        <input id="amount2" type="number" class="form-control" aria-label="Amount of second currency" readonly value="<?php echo round($convert,4); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <span class="from"><?php if(isset($curencyFrom)) echo $curencyFrom; ?></span>/<span class="to"><?php if(isset($curencyTo)) echo $curencyTo;?></span> :
                <?php if(isset($convertRight)) echo round($convertRight,4).' as on '.date('j/m/Y H:i'); ?>
            </div>
            <div>
                <span class="from"><?php if(isset($curencyTo)) echo $curencyTo;?></span>/<span class="to"><?php if(isset($curencyFrom)) echo $curencyFrom;?></span> :
                <?php if(isset($convertLeft)) echo round($convertLeft,4).' as on '.date('j/m/Y H:i'); ?>
            </div>
        </div>
    </form>

    </div>
<div id="curve_chart" style="width: 100%; height: 500px"></div>

</body>
</html