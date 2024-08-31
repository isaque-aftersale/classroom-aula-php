<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Salure</title>
</head>

<body>
    <?php headerTemplate() ?>

    <form action="/user-salure/calc" method="GET">
        <div>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="John sales" />
        </div>
        <div>
            <label for="age">Age</label>
            <input type="Number" id="age" name="age" placeholder="43" />
        </div>
        <button>!! Hello !!</button>
    </form>


    <?php if (!empty($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <?php if (!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

</body>

</html>