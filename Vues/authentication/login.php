<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $request->getSiteUrl() ?>css/authentication.css">
    <title>Identification d'utilisateur</title>
</head>

<body>

    <!-- Login form -->
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">
                <form action="home" method="post">
                    <h3>Connectez vous a votre espace domotique</h3>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_signin" id="email_signin" />
                    </div>

                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" name="password_signin" id="password_signin" />
                    </div>

                    <button type="submit" name="login" id="sign_in"
                        class="btn btn-outline-primary btn-lg btn-block">Se connecter</button>

                    <div>
                        <b>Pas encore inscrit ?</b>
                        <a href="register">Inscription</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<footer>
    <script src="js/user.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/login.js"></script>
</footer>

</html>