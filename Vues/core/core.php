<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/animation.css">
    <link rel="stylesheet" href="/css/var.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/mobile.css">
    <title>Ma maison</title>
</head>
<body class="app">
<header class="head">
    <section class="head-left">
        <nav class="head-nav">
            <ul>
                <li>
                    <button class="head-nav-btn" id="open-side-menu">
                        Ouvrir le menu
                        <img src="/assets/images/icons/double_arrow.svg" alt="">
                    </button>
                </li>
                <li>
                    <button class="head-nav-btn-notification" id="alert-show">
                        <div class="count" id="alert-count">0</div>
                        <img src="/assets/images/icons/notification-bell.svg" alt="">
                    </button>
                </li>
            </ul>
        </nav>
    </section>
    <section class="head-right">
        <img src="assets/images/weather/partly_cloudy.png" alt="" id="meteo-logo">
        <p>
            <span id="dayName">Jeudi</span> <span id="day"></span> <span id="month"></span> <span id="years"></span>
        </p>
        <p>
            <span id="hours">14</span> : <span id="minutes">03</span>
        </p>
    </section>
</header>
<?= $content ?>
<section class="modal" id="alert-modal">
    <article>
        <header>
            <h2>Dernières alertes</h2>
        </header>
        <ul id="alert-modal-list">
        </ul>
    </article>
</section>
<footer>
    <script src="js/user.js"></script>
    <script src="js/loader.js"></script>
    <script>const loader = new Loader()</script>
    <script src="js/color.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/controller.js"></script>
    <script src="js/controllers/capteurController.js"></script>
    <script src="js/controllers/homeController.js"></script>
    <script src="js/controllers/maisonController.js"></script>
    <script src="js/router.js"></script>
    <script src="js/app.js"></script>
    <script src="js/alert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"
            integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA=="
            crossorigin="anonymous" defer async></script>
</footer>
</body>
</html>