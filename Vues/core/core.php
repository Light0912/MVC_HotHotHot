<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $request->getSiteUrl() ?>css/style.css">
    <title>Home</title>
</head>

<body>
    <header>
        <nav>
            <ul class="links">
                <li><a href="/">Home</a></li>
                <li><a href="<?= \vendor\System\Router::getLink('index') ?>">Générateur de Groupe</a></li>
                <li><a href="/data">Database</a></li>
            </ul>
        </nav>
    </header>
    <?= $content ?>
    <div class="background"></div>
</body>

</html>