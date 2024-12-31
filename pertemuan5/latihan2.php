<?php
// pengulangan pada array
// for / foreach

$numbers = [3, 6, 9, 12, 213, 323, 1];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .box {
            width: 100px;
            height: 100px;
            background-color: salmon;
            text-align: center;
            line-height: 100px;
            margin: 5px;
            float: left;
            font-size: 50px;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php for ($i = 0; $i < count($numbers); $i++) { ?>
        <div class="box"><?= $numbers[$i]; ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach ($numbers as $number) { ?>
        <div class="box"><?= $number; ?></div>
    <?php } ?>

    <div class="clear"></div>

    <?php foreach ($numbers as $number) : ?>
        <div class="box"><?= $number; ?></div>
    <?php endforeach; ?>
</body>

</html>