<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $request->getSiteUrl() ?>css/authentication.css">
    <title>Inscription d'utilisateur</title>
</head>

<body>

<div class="App">
    <div class="vertical-center">
        <div class="inner-block">
            <form action="login" method="post">
                <h3>Inscription</h3>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" class="form-control" name="firstname" id="firstName" />
                </div>

                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="lastname" id="lastName" />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" />
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" />
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">
                    S'inscrire
                </button>

                <div>
                    <b>Déjà inscrit ?</b>
                    <a href="login">Connection</a>
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