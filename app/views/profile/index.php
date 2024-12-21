<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/profile.css" type="text/css" />
    <link rel="icon" href="/ProjektDuckHelp/public/images/kaczka.png" type="image/x-icon" />
    <script src="/ProjektDuckHelp/public/js/profile.js"></script>
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
                <a href="/ProjektDuckHelp/public/scoreboards/index">Najlepsi pomocnicy</a>
                <a href="/ProjektDuckHelp/public/profile/index"><span style="color: #ca935e;">Profil</span></a>
                <a href="/ProjektDuckHelp/public/help/index">Pomoc</a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="main-content-profile">
            <div class="main-container">

            <div class="table-container">
                <h1>Profil</h1>
                <table class="profile-table">
                    <tr>
                        <th>Login:</th>
                        <td><?php echo htmlspecialchars($data['userInfo']['login']); ?></td>
                    </tr>
                    <tr>
                        <th>Hasło:</th>
                        <td>********</td>
                        <td><button class="edit-button" onclick="openModal()">&#9998;</button></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo htmlspecialchars($data['userInfo']['email']); ?></td>
                        <td><button class="edit-button" onclick="openEmailModal()">&#9998;</button></td>
                    </tr>
                </table>
            </div>

            <div id="passwordChangeModal" class="modal-window">
                <div class="modal-window-content">
                    <h2>Edytuj hasło</h2>
                    <form id="passwordChangeForm" action="/ProjektDuckHelp/public/profile/index/changePass" method="post">
                    <table class="modal-table">
                            <tr>
                                <td><label for="oldPass">Stare hasło:</label></td>
                                <td><input type="password" id="oldPass" name="oldPass" required></td>
                            </tr>
                            <tr>
                                <td><label for="newPass">Nowe Hasło:</label></td>
                                <td><input type="password" id="newPass" name="newPass" required></td>
                            </tr>
                            <tr>
                                <td><label for="password">Powtórz Hasło:</label></td>
                                <td><input type="password" id="password" name="password" required></td>
                            </tr>
                            </table>
                            <div class="buttons-profile">
                                <button type="submit">Zmień</button>
                                <button onclick="closeModal()">Anuluj</button>
                            </div>
                    </form>
                </div>
            </div>

            <div id="emailChangeModal" class="modal-window">
                <div class="modal-window-content">
                    <h2>Edytuj email</h2>
                    <form id="emailChangeForm" action="/ProjektDuckHelp/public/profile/index/changeEmail" method="post">
                    <table class="modal-table">
                            <tr>
                                <td><label for="newEmail">Nowy email:</label></td>
                                <td><input type="email" id="newEmail" name="newEmail" required></td>
                            </tr>
                            </table>
                            <div class="buttons-profile">
                                <button type="submit">Zmień</button>
                                <button onclick="closeModal()">Anuluj</button>
                            </div>
                    </form>
                </div>
            </div>

            </div>
            <div id="errorContainer" class="error-container"></div>
        </div>
        <footer>
            <p>&copy;MS Help Duck</p>
        </footer>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const error = "<?php echo htmlspecialchars($data['error']); ?>";
            if (error) {
                console.log(error);
                if (error === 'incorrectData') {
                    showError("Błędne dane");
                } else if (error === 'incorrectOldPassword') {
                    showError("Niepoprawne stare hasło");
                } else if (error === 'passwordNotChanged') {
                    showError("Hasło nie zostało zmienione");
                } else if (error === 'passwordChanged') {
                    changeErrorColor();
                    showError("Hasło zostało zmienione");
                }
            }
        });
    </script>
</body>
</html>