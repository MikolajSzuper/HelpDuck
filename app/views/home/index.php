<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/auth.css" type="text/css" />
    <link rel="icon" href="/ProjektDuckHelp/public/images/kaczk2.png" type="image/x-icon" />
    <style>
        .error-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f44336;
            color: white;
            padding: 16px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1001;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .error-container.show {
            display: block;
            opacity: 1;
        }

        .error-container.hide {
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="/ProjektDuckHelp/public/images/logo.png" alt="Logo">
            </div>
            <nav>
                <a href="/ProjektDuckHelp/public/home/index"><span style="color: #ca935e;">Strona Główna</span></a>
                <a href="/ProjektDuckHelp/public/game/index">Graj</a>
                <a href="/ProjektDuckHelp/public/help/index">Pomoc</a>
                <a href="/ProjektDuckHelp/public/scoreboards/index">Najlepsi pomocnicy</a>
                <?php if ($data['isLoggedIn'] == 'loggedin'): ?>
                <a href="/ProjektDuckHelp/public/profile/index">Profil</a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="main-content">
            <div class="duck-drawing">
                <img src="/ProjektDuckHelp/public/images/kaczk2.png" alt="Kaczka">
            </div>
            <div class="text-content">
                <h1><span style="color: #ca935e;">Help</span> Duck</h1>
                <div class="content">
                    <p>Help Duck to gra pełna wyzwań i zabawy! Twoim zadaniem jest pomóc małej, odważnej kaczce przedostać się bezpiecznie przez ruchliwą ulicę. Uważaj na samochody, rowerzystów i inne przeszkody, które mogą stanąć na jej drodze!</p>
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
            <form id="registerForm" action="/ProjektDuckHelp/public/home/index/register" method="post">
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
    <script src="/ProjektDuckHelp/public/js/auth.js"></script>
    <script>

    function changeErrorColor(){
        document.getElementById('errorContainer').style.backgroundColor = 'green';
    }

function showError(message) {
    const errorContainer = document.getElementById('errorContainer');
    errorContainer.textContent = message;
    errorContainer.style.display = 'block';
    setTimeout(() => {
        errorContainer.classList.add('show');
        setTimeout(() => {
            errorContainer.classList.remove('show');
            errorContainer.classList.add('hide');
            setTimeout(() => {
                errorContainer.classList.remove('hide');
                errorContainer.style.display = 'none';
                document.getElementById('errorContainer').style.backgroundColor = '#f44336';
            }, 500); 
        }, 3000); 
    }, 10); 
}
        <?php if(isset($data['error'])): ?>
    <?php if ($data['error'] == 'userExists'): ?>
        showError("Taki użytkownik już istnieje");
    <?php elseif ($data['error'] == 'userNoExists'): ?>
        showError("Nie ma takiego użytkownika");
    <?php elseif ($data['error'] == 'wrongPassword'): ?>
        showError("Niepoprawne hasło");
    <?php elseif ($data['error'] == 'registerSuccess'): ?>
        changeErrorColor();
        showError("Zarejestrowano pomyślnie");
    <?php endif; ?>
    <?php endif; ?>
    </script>
</body>
</html>