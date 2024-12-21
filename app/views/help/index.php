<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Duck</title>
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/global.css" type="text/css" />
    <link rel="stylesheet" href="/ProjektDuckHelp/public/css/help.css" type="text/css" />
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
                <a href="/ProjektDuckHelp/public/scoreboards/index">Najlepsi pomocnicy</a>
                <a href="/ProjektDuckHelp/public/profile/index">Profil</a>
                <a href="/ProjektDuckHelp/public/help/index"><span style="color: #ca935e;">Pomoc</span></a>
                <a href="/ProjektDuckHelp/public/home/index/logout">Wyloguj</a>
                <?php endif; ?>
            </nav>
        </header>
        <div class="main-content-help">
            <div class="main-container">
            <h1>Jak grac?</h1>
                <div class="help-container">
                    <div class="help-content">
                        <h2>Krok 1</h2>
                        Aby zaczą grać musimy kliknąć przycisk Graj na górnym pasku nawigacyjnym lub pod tekstem na stronie startowej.
                    </div>  
                    <div class="help-image">
                    <img src="/ProjektDuckHelp/public/images/step1.png" alt="Help">
                    </div> 
                </div>  

                <div class="help-container">
                    <div class="help-content">
                    <h2>Krok 2</h2>
                        Teraz gdy już jesteśmy w grze musimy przeprowadzić kaczkę na drugą stronę ulicy. Aby to zrobić musimy nacisnąć przycisk z plusem na ekranie.
                    </div>  
                    <div class="help-image">
                    <img src="/ProjektDuckHelp/public/images/step2.png" alt="Help">
                    </div> 
                </div> 

                <div class="help-container">
                    <div class="help-content">
                    <h2>Krok 3</h2>
                        Jak widzimy po kliknięciu przycisku kaczka przesuwa się do przodu a licznik naszych dróg rośnie. Gdy dojdziemy do końca naszej wielopasmowej drogi przejdziemy na nastepny poziom.
                    </div>  
                    <div class="help-image">
                    <img src="/ProjektDuckHelp/public/images/step3.png" alt="Help">
                    </div> 
                </div> 

            <h1>Formularz kontaktowy</h1>
            <div class="form-container">
                <form action="/ProjektDuckHelp/public/help/index/sendMessage" method="post">
                    <label for="message">Wiadomość:</label>
                    <textarea id="message" name="message" required></textarea>
                    <div class="buttons">
                    <button type="submit">Wyślij</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <footer>
            <p>&copy;MS Help Duck</p>
        </footer>
    </div>
</body>
</html>