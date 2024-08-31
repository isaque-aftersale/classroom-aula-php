<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php headerTemplate() ?>

    <form action="/multiplication-table/calc" method="GET">
        <label for="number">Number</label>
        <input type="number" name="number" id="number" />
        <button>Calculate</button>
    </form>

    <?php if (!empty($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>

</html>