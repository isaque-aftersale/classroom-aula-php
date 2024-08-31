<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php headerTemplate() ?>

    <form action="<?= EndPointEnum::CALCULATE_RECTANGLE_AREA_CALC ?>" method="GET">
        <div>
            <label for="width">Width</label>
            <input type="number" id="width" name="width" placeholder="12.2">
        </div>
        <div>
            <label for="height">Height</label>
            <input type="number" id="height" name="height" placeholder="12.2">
        </div>

        <button>Calculate Area</button>
    </form>

    <?= when(!empty($area), fn() => $area); ?>
</body>

</html>