<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/is-par-or-impar/calc" method="GET">
        <label for="number">Number</label>
        <input type="number" name="number" id="number" required />
        <button>This Number Par or Impar ?</button>
    </form>

    <?php if(!empty($response)): ?>
        <p><?= $response ?></p>
    <?php endif; ?>
</body>
</html>