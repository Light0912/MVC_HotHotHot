<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $request->getSiteUrl() ?>css/authentication.css">
    <title>User Registration</title>
</head>

<body>

<div class="App">
    <div class="vertical-center">
        <div class="inner-block">
            <form action="login" method="post">
                <h3>Register</h3>
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="firstname" id="firstName" />
                </div>

                <div class="form-group">
                    <label>Last name</label>
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
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>

                <button type="submit" name="submit" id="submit" class="btn btn-outline-primary btn-lg btn-block">
                    Sign up
                </button>
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