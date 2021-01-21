<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?= $request->getSiteUrl() ?>css/login.css">
    <title>Connexion</title>
</head>
<body>
<div class="container">
    <div class="login-box">
        <h1>Connectez vous a votre espace domotique</h1>
        <form action="#" method="post" id="login-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group center">
                <input type="submit" id="submit" value="Connection">
            </div>
        </form>
    </div>
</div>
<footer>
    <script src="js/user.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/login.js"></script>
</footer>
</body>
</html>