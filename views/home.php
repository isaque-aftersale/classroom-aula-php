<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        ul li {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        ul li span {
            font-family: Arial, Helvetica, sans-serif;
            font-size: .7em;
        }
    </style>
</head>

<body>
    <h1>Home Page</h1>

    <ul>
        <?php foreach ($menu as $key => $item): ?>
            <li>
                <a href="<?= $item['path'] ?>"><?= $item['text'] ?></a>
                <span><?= $item['br'] ?></span>
                <span><?= $item['us'] ?></span>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Releases / Novo</h3>
    <ol>
        <?php foreach ($releases as $release): ?>
            <li><?= $release ?></li>
        <?php endforeach; ?>
    </ol>

</body>

</html>