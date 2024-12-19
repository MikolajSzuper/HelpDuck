<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/game.css" type="text/css" />
    <link rel="icon" href="/ProjektDuckHelp/public/images/kaczka.png" type="image/x-icon" />
    <script src="/ProjektDuckHelp/public/js/game.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="/ProjektDuckHelp/public/images/logo.png" alt="Logo">
            </div>
            <nav>
                <?php if ($data['isLoggedIn'] == 'loggedin'): ?>
                <a href="/ProjektDuckHelp/public/home/index">Strona Główna</a>
                <a href="/ProjektDuckHelp/public/game/index"><span style="color: #ca935e;">Graj</span></a>
                <a href="/ProjektDuckHelp/public/help/index">Pomoc</a>
                <a href="/ProjektDuckHelp/public/scoreboards/index">Najlepsi pomocnicy</a>
                <a href="/ProjektDuckHelp/public/profile/index">Profil</a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="game-content">
            <div class="info">
                <h1>Poziom: <span class="level-info">1</span></h1>
                <h2>Droga: <span class="road-info">1</span></h2>
            </div>
            <div class="game">
                    <div class="road" id="road1">
                    <div class="lane"></div>
                    <div class="duck" id="duck"></div>
                </div>
                <div class="road" id="road2">
                    <div class="lane"></div>
                    <div class="button-container">
                        <button onclick="moveDuck()">+</button>
                    </div>
                </div>
                <div class="road" id="road3">
                    <div class="lane"></div>
                </div>
                <div class="road" id="road4">
                    <div class="lane"></div>
                </div>
                <div class="road" id="road5">
                    <div class="lane"></div>
                </div>
                <div class="road" id="road6">
                    <div class="lane"></div>
                </div>
                <div class="road" id="road7">
                    <div class="lane"></div>
                </div>
                <div class="road" id="road8">
                    <div class="lane"></div>
                </div>
            </div>
        </div>
        <footer>
            <p>&copy;MS Help Duck</p>
        </footer>
    </div>
</body>
</html>