<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/multiplication-table/calc" method="GET">
        <label for="number">Number</label>
        <input type="number" name="number" id="number" require />
        <button>Calculate</button>
    </form>

    <?php if (!empty($multiplecationTable)): ?>
        <?php foreach ($multiplecationTable as $calc): ?>
            <p><?= $calc['value1'] ?> * <?= $calc['value2'] ?> = <?= $calc['result'] ?> </p>
        <?php endforeach ?>
    <?php endif; ?>
</body>

</html>