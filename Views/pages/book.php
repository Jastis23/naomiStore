<div class="contact-form">
    <h2 class="title text-center">Проанализировать свои достижения</h2>
    <p>
        <img class="lImg" src="public/images/man.jpg"/> Приветствуем, Вас, дорогой наш пользователь ! На этой странице мы предоставляем вам возможность оценить, проанализировать, подойти так сказать
        с научной точки зрения к вашим успехам в спорте.Данный ресурс позволит вам отследить на диаграмме тенденцию роста вашей мышечной массы, если 
        вы набираете вес или оценить тенденцию снижения веса, если вы желаете похудеть. </br>
        Такой подходт к вашим занятимя позволяет наглядно наблюдать всю текущую ситуацию без всякого самообмана.
    </p>
    <div class="status alert alert-success" style="display: none"></div>
    <h2 class="title text-center">Введите свой вес на протяжении 6 месяцев</h2>
    <?php
    if ($_SESSION['login']) {
        ?>
        <form id="main-contact-form" class="contact-form row" name="contact-form" action="index.php">
            <input type="hidden" name="view" value="book"/>
            <div class="form-group col-md-6">
                <input type="text" name="x1" class="form-control" required="required" placeholder="1 месяц">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="x2" class="form-control" required="required" placeholder="2 месяц">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="x3" class="form-control" required="required" placeholder="3 месяц">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="x4" class="form-control" required="required" placeholder="4 месяц">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="x5" class="form-control" required="required" placeholder="5 месяц">
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="x6" class="form-control" required="required" placeholder="6 месяц">
            </div>
            <div class="form-group col-md-6" >
                <input id="but" type="submit" name="submit" class="btn btn-primary pull-right" value="Посторить">
            </div>
        </form>
    </div>  
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <html>
        <head>
            <script type="text/javascript"
                    src="https://www.google.com/jsapi?autoload={
                    'modules':[{
                    'name':'visualization',
                    'version':'1',
                    'packages':['corechart']
                    }]
            }"></script>
            <?php
            $x1 = $_GET['x1'];
            $x2 = $_GET['x2'];
            $x3 = $_GET['x3'];
            $x4 = $_GET['x4'];
            $x5 = $_GET['x5'];
            $x6 = $_GET['x6'];
            ?>

            <script type="text/javascript">
                                google.setOnLoadCallback(drawChart);
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                        ['Отрезок', 'Вес' ],
                                        ['1', <?= (int) $x1 ?>, ],
                                        ['2', <?= (int) $x2 ?>, ],
                                        ['3', <?= (int) $x3 ?>, ],
                                        ['4', <?= (int) $x4 ?>, ],
                                        ['5', <?= (int) $x5 ?>, ],
                                        ['6',<?= (int) $x6 ?>, ]
                                ]);
                                        var options = {
                                        title: 'Ваши достижения',
                                                curveType: 'function',
                                                legend: { position: 'bottom' }
                                        };
                                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                                        chart.draw(data, options);
                                }
            </script>


        </head>
        <body>

            <div id="curve_chart" style="width: 900px; height: 500px"></div>

        </body>
    </html>

    <?php
    if (!$_GET['x1']) {
        $x1 = 1;
    } else {
        $x1 = $_GET['x1'];
    }
    $x2 = $_GET['x2'];
    $x3 = $_GET['x3'];
    $x4 = $_GET['x4'];
    $x5 = $_GET['x5'];
    $x6 = $_GET['x6'];
    ?>


    <html>
        <head>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
            <script type="text/javascript">
                                google.load("visualization", "1", {packages:["corechart"]});
                                google.setOnLoadCallback(drawChart);
                                function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                        ['Task', 'Hours per Day'],
                                        ['1', <?= (int) $x1 ?>],
                                        ['2', <?= (int) $x2 ?>],
                                        ['3', <?= (int) $x3 ?>],
                                        ['4', <?= (int) $x4 ?>],
                                        ['5', <?= (int) $x5 ?>],
                                        ['6', <?= (int) $x6 ?>]
                                ]);
                                        var options = {
                                        title: 'Ваши достижения',
                                                is3D: true,
                                        };
                                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                        chart.draw(data, options);
                                }
            </script>
        </head>
        <body>
            <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        </body>
    </html>
    <?php
} else
    echo "<h4>Вам необходимо зарегестрироваться, что бы функция стала доступной !</h4><a href='index.php?view=auth'>Регистрация</a>"
?>