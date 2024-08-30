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
        <li>
            <a href="/multiplication-table">Multiplication Table</a>
            <span>BR.: Retorna a tabuada a partir de um número decimal</span>
            <span>US.: Return an multiplication table of decimal number</span>
        </li>
        <li>
            <a href="/is-par-or-impar">Number is Par or Impar</a>
            <span>BR.: Verificar se um número é impar ou par</span>
            <span>US.: Cheking if number is impar or par</span>
        </li>
        <li>
            <a href="/user-salure">User Salure</a>
            <span>BR.: Fazer uma saldação para o usuário</span>
            <span>US.: Make salure to user</span>
        </li>
    </ul>

    <?php if (!empty($releases)): ?>
        <h3>Releases / Novo</h3>
        <?php foreach ($releases as $release): ?>
            <ol>
                <li><?= $release ?></li>
            </ol>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>