<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan 1</title>
    <style>
        .box {
            width: 100px;
            height: 100px;
            background-color: salmon;
            text-align: center;
            line-height: 100px;
            margin: 5px;
            float: left;
            font-size: 40px;
            transition: 1s;
        }
        .box:hover {
            transform: rotate(360deg);
            background-color: lightblue;
            border-radius: 50%;
        }
        .clear {
            clear: both;
        }
    </style>
</head>

<body>

    <?php
    $numbers = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
    ?>

    <?php foreach ($numbers as $number): ?>
        <?php foreach ($number as $n): ?>
            <div class="box"><?= $n; ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    <?php endforeach; ?>
    </div>

</body>

</html>