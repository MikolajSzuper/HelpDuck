<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/auth.css" type="text/css" />
    <link rel="icon" href="/ProjektDuckHelp/public/images/kaczka.png" type="image/x-icon" />
    <script src="/ProjektDuckHelp/public/js/auth.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="/ProjektDuckHelp/public/images/logo.png" alt="Logo">
            </div>
            <nav>
                <a href="/ProjektDuckHelp/public/home/index"><span style="color: #ca935e;">Strona Główna</span></a>
                <?php if ($data['isLoggedIn'] == 'loggedin'): ?>
                <a href="/ProjektDuckHelp/public/game/index">Graj</a>
                <a href="/ProjektDuckHelp/public/scoreboards/index">Najlepsi pomocnicy</a>
                <a href="/ProjektDuckHelp/public/profile/index">Profil</a>
                <a href="/ProjektDuckHelp/public/help/index">Pomoc</a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="main-content">
            <div class="duck-drawing">
                <img src="/ProjektDuckHelp/public/images/kaczka.png" alt="Kaczka">
            </div>
            <div class="text-content">
                <h1><span style="color: #ca935e;">Help</span> Duck</h1>
                <div class="content">
                    <p>Help Duck to gra pełna wyzwań i zabawy! Twoim zadaniem jest pomóc małej, odważnej kaczce przedostać się bezpiecznie przez ruchliwą ulicę. Uważaj na samochody, motocyklistów i inne przeszkody, które mogą stanąć na jej drodze!</p>
                    <p>Każdy poziom staje się trudniejszy, a ulice bardziej zatłoczone. Zbieraj punkty, omijaj niebezpieczeństwa i doprowadź kaczkę na drugą stronę w jednym kawałku. Gra łączy zręczność z humorem, zapewniając świetną rozrywkę dla graczy w każdym wieku.</p>
                    <p>Czy uda Ci się przejść wszystkie poziomy? Pomóż kaczce już teraz!</p>
                </div>
                <?php if ($data['isLoggedIn'] != 'loggedin'): ?>
                <div class="buttons">
                    <button onclick="openModal()">Zaloguj</button>
                    <button onclick="openRegisterModal()">Zarejestruj</button>
                </div>
                <?php else: ?>
                    <div class="buttons">
                    <button onclick="window.location.href='/ProjektDuckHelp/public/game/index/'">Graj</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <footer>
            <p>&copy;MS Help Duck</p>
        </footer>
    </div>

    <div id="errorContainer" class="error-container"></div>

    <div id="loginModal" class="modal-window">
        <div class="modal-window-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Logowanie</h2>
            <form id="loginForm" action="/ProjektDuckHelp/public/home/index/login" method="post">
            <table class="modal-table">
                    <tr>
                        <td><label for="username">Login:</label></td>
                        <td><input type="text" id="username" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Hasło:</label></td>
                        <td><input type="password" id="password" name="password" required></td>
                    </tr>
                    </table>
                    <div class="buttons">
                        <button type="submit">Zaloguj</button>
                        <button onclick="closeModal()">Anuluj</button>
                    </div>
            </form>
        </div>
    </div>

    <div id="registerModal" class="modal-window">
        <div class="modal-window-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Rejestracja</h2>
            <form id="registerForm" action="/ProjektDuckHelp/public/home/index/register" method="post" onsubmit="return validateForm()">
                <table class="modal-table">
                    <tr>
                        <td><label for="reg-username">Login:</label></td>
                        <td><input type="text" id="reg-username" name="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="reg-email">Email:</label></td>
                        <td><input type="email" id="reg-email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="reg-password">Hasło:</label></td>
                        <td><input type="password" id="reg-password" name="password" required></td>
                    </tr>
                    <tr>
                        <td><label for="reg-repeat-password">Powtórz hasło:</label></td>
                        <td><input type="password" id="reg-repeat-password" name="repeat_password" required></td>
                    </tr>
                </table>
                <div class="buttons">
                        <button type="submit">Zarejestruj</button>
                        <button onclick="closeModal()">Anuluj</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.body.dataset.error = "<?php echo isset($data['error']) ? $data['error'] : ''; ?>";
    </script>
</body>
</html>