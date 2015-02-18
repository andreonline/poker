<?php
$mes = 2;
$ano = 2015;

setlocale(LC_TIME, "portuguese");

switch ($mes) {
    case 1:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 1));
        break;
    case 2:
        $dias = 28;
        $nome = strftime("%B", mktime(0, 0, 0, 2));
        break;
    case 3:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 3));
        break;
    case 4:
        $dias = 30;
        $nome = strftime("%B", mktime(0, 0, 0, 4));
        break;
    case 5:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 5));
        break;
    case 6:
        $dias = 30;
        $nome = strftime("%B", mktime(0, 0, 0, 6));
        break;
    case 7:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 7));
        break;
    case 8:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 8));
        break;
    case 9:
        $dias = 30;
        $nome = strftime("%B", mktime(0, 0, 0, 9));
        break;
    case 10:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 10));
        break;
    case 11:
        $dias = 30;
        $nome = strftime("%B", mktime(0, 0, 0, 11));
        break;
    case 12:
        $dias = 31;
        $nome = strftime("%B", mktime(0, 0, 0, 12));
        break;

    default:
        break;
}

$carnaval = array(12, 13, 14, 15, 16, 17, 18);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Calendário</title>

        <!-- CSS -->
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="../css/standardStyle.css"/>

        <!--Import jQuery before materialize.js-->
        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
        <script src="//code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/functions.js"></script>
        <style>
            .dia{
                border: 1px solid #fff;
            }
            .dia:hover{
                opacity: 0.8;
            }
        </style>

    </head>
    <body>
        <div class="row ">
            <div class="col l6 ">
                <h3 style="margin: 1px" class="center grey-text text-lighten-4 teal lighten-1"><?= $nome ?></h3>
                <table class="centered ">
                    <thead class="teal lighten-3">
                        <tr>
                            <th>D</th>
                            <th>S</th>
                            <th>T</th>
                            <th>Q</th>
                            <th>Q</th>
                            <th>S</th>
                            <th>S</th>
                        </tr>
                    </thead>
                    <?php
                    echo "<tr>";
                    for ($i = 1; $i <= $dias; $i++) {
                        $diadasemana = date("w", mktime(0, 0, 0, $mes, $i, $ano));
                        $cont = 0;
                        if ($i == 1) {
                            while ($cont < $diadasemana) {
                                echo "<td></td>";
                                $cont++;
                            }
                        }
                        echo "<td class='dia grey-text text-lighten-4 teal'>";
                        echo $i;
                        echo "</td>";
                        if ($diadasemana == 6) {
                            echo "</tr>";
                            echo "<tr>";
                        }
                    }
                    echo "</tr>";
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>