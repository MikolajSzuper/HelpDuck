<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/scoreboard.css" type="text/css" />
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
                <a href="/ProjektDuckHelp/public/scoreboards/index"><span style="color: #ca935e;">Najlepsi pomocnicy</span></a>
                <a href="/ProjektDuckHelp/public/profile/index">Profil</a>
                <a href="/ProjektDuckHelp/public/help/index">Pomoc</a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="main-content-tables">
        <div class="main-content-scores">
            <div class="best5-container">
                <h1>Najlepsi pomocnicy</h1>
            <table>
        <thead>
            <tr>
                <th>Lp.</th>
                <th>Imię</th>
                <th>Poziom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['best5'] as $place => $info): ?>
            <tr>
                <td><?php echo $place+1; ?></td>
                <td><?php echo $info['name']; ?></td>
                <td><?php echo $info['level']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
            <div class="newest5-container">
                <h1>Ostatnio zarejestrowani</h1>
    <table>
        <thead>
            <tr>
                <th>Lp.</th>
                <th>Imię</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['newest5'] as $place => $info): ?>
            <tr>
                <td><?php echo $place+1; ?></td>
                <td><?php echo $info['name']; ?></td>
                <td><?php echo $info['registration_date']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
        </div>
        </div>
        <footer>
            <p>&copy;MS Help Duck</p>
        </footer>
    </div>
</body>
</html>