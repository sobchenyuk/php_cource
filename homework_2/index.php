<?php
require_once 'class/optionValue.php';
require_once 'class/FieldType.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <style>
        .submit {
            padding: 0;
            margin-top: 1.8em;
        }
    </style>
</head>
<body>

<h2 class="text-center">Калькулятор</h2>

<div class="container">
    <?php $FieldType->getType(); ?>
</div>

<div class="container">
    <div class="row">
        <form role="form" method="post" >

            <div class="form-group col-md-2">
                <label for="first">Первое число</label>
                <input type="text" name="firstNumber" class="form-control" id="first" value="" placeholder="Число">
            </div>


            <div class="form-group col-md-2">
                <label for="step">Выбор действия</label>
                <select class="form-control" id="step" name="options">
                    <?php $OptionValue->getValue(); ?>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label for="last">Второе число</label>
                <input type="text" name="lastNumber" class="form-control" id="last" value="" placeholder="Число">
            </div>

            <div class="col-md-3">

                <div class="col-md-2 submit">

                <button type="submit" class="btn btn-default">=</button>

                </div>

                <div class="col-md-10">
                <div class="form-group ">
                    <label for="result">Результат</label>
                    <input type="text" name="result" class="form-control" id="result" placeholder="Рузультат" value="<?php echo $FieldType->res ?>" disabled>
                </div>
                </div>
            </div>

        </form>

    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>


<?php

