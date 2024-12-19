<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/auth.css" type="text/css" />
    <link rel="icon" href="/ProjektDuckHelp/public/images/kaczka.png" type="image/x-icon" />
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
                <a href="/ProjektDuckHelp/public/game/index">Graj</a>
                <a href="/ProjektDuckHelp/public/help/index"><span style="color: #ca935e;">Pomoc</span></a>
                <a href="/ProjektDuckHelp/public/scoreboards/index">Najlepsi pomocnicy</a>
                <a href="/ProjektDuckHelp/public/profile/index">Profil</a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="main-content">
            
        </div>
        <footer>
            <p>&copy;MS Help Duck</p>
        </footer>
    </div>
</body>
</html>