<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Calculator</title>
</head>

<body>
    <?= headerTemplate() ?>

    <form action="<?= EndPointEnum::BASIC_CALCULATOR_CALC ?>" method="GET">
        <div>
            <label for="value1">Value 1</label>
            <input type="number" id="value1" name="value1" />
        </div>
        <div>
            <label for="value2">Value 2</label>
            <input type="number" id="value2" name="value2" />
        </div>
        <select name="operator" id="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="/">/</option>
            <option value="*">*</option>
            <option value="%">%</option>
            <option value="^">^</option>
        </select>

        <button>Calcular</button>
    </form>

    <?= when(!empty($result), fn() => $result) ?>
    <?= when(!empty($error), fn() => $error) ?>
</body>

</html>