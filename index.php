<?php
    include_once("complexNumOp.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>Операции с комплексными числами</title>
    </head>
    <body>

<div class="complexNumbers">

    <form class="complexNumbers" action="" method="GET">
            <p class="Number_name">Первое комплексное число</p>
            <input class="number" type="text" name="realNum1" value="<?php if(isset($_GET["realNum1"])) echo $_GET["realNum1"]; ?>"> +
            <input class="number" type="text" name="imNum1" value="<?php if(isset($_GET["realNum1"])) echo $_GET["imNum1"]; ?>"><span>i</span>
            <br>

            <select id="opSelect" name="operation">
                <option value="sum">+</option>
                <option value="subtract">-</option>
                <option value="multiplicate">*</option>
                <option value="divide">/</option>
            </select>

            <p class="Number_name">Второе комплексное число</p>
            <input class="number" type="text" name="realNum2" value="<?php if(isset($_GET["realNum1"])) echo $_GET["realNum2"]; ?>"> +
            <input class="number" type="text" name="imNum2" value="<?php if(isset($_GET["realNum1"])) echo $_GET["imNum2"]; ?>"><span>i</span>
            <br>

        <input type="submit" id="btn" name="" value="Вычислить">
    </form>

    <!-- Обработка введенных данных и вывод результата -->
    <p id="msg">
        <?php
            $real1 = $_GET["realNum1"];
            $real2 = $_GET["realNum2"];
            $im1 = $_GET["imNum1"];
            $im2 = $_GET["imNum2"];

            if(!empty($real1) && !empty($real2) && !empty($im1) && !empty($im2)){
                $begin = new ComplexNumOp($real1, $im1, $real2, $im2);

                $operation = $_GET["operation"];

                $res = $begin->$operation();

                echo $res;
            }
            else{
                echo "Не все поля были заполнены.";
            }
        ?>
    </p>

    <!-- Подключение скрипта для сохранения операции -->
    <script src="saveSelect.js"></script>
</div>

    </body>
</html>
