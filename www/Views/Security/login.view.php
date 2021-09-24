<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="Assets\images\favicon\apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Assets\images\favicon\/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Assets\images\favicon\/favicon-16x16.png">
    <link rel="manifest" href="Assets\images\favicon\/site.webmanifest">
    <link rel="mask-icon" href="Assets\images\favicon\safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Masterpage</title>
    <meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" media="screen" href="Assets\css\prod\styles.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="Assets\css\styles-dev.css">
    <script src="Assets\js\jquery.min.js"></script>
    <script src="Assets\js\esgi-scripts.js"></script>
</head>

<body>
    <header id="esgi-header">
        <div class="esgi-site">
            <img class="esgi-logo" src="Assets\images\esgi.png" alt="logo">
            <h1>Connexion</h1>
        </div>

        <div class="esgi-header-tools">
            <a href="/front">Accueil</a>
            <a href="/help">Aide</a>
        </div>
    </header>
    
    <main id="esgi-main">
        <div class="esgi-section">
            <div class="esgi-grid">
                <div class="esgi-grid-cell esgi-grid1">
                    <div class="esgi-grid-gutter">
                        &nbsp;
                    </div>
                </div>

                <div class="esgi-grid-cell esgi-grid10">
                    <div class="esgi-grid-gutter">
                        <div class="esgi-form-holder">
                            <form action="" method="POST">
                                <div id="esgi-form-header">
                                    <h2>Connectez vous à votre espace personnel</h2>
                                </div>
                                <div class="form-entry">
                                    <input type="text" placeholder="Identifiant" name="email">
                                </div>
                                <div class="form-entry">
                                    <input type="password" placeholder="Mot de passe" name="password">
                                </div>
                                <div class="form-entry">
                                    <button type="submit">Connexion</button>
                                </div>
                                <div class="form-entry">
                                    <a href="/reset_password.html">Mot de passe oublié</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="esgi-grid-cell esgi-grid1">
                    <div class="esgi-grid-gutter">
                        &nbsp;
                    </div>
                </div>
                <div class="esgi-clear"></div>
            </div>
            <div class="esgi-clear"></div>
        </div>
    </main>

    <footer id="esgi-footer">
            <p>Bienvenue sur votre Site</p>
            <p>© All rights reserved</p>
    </footer>
</body>
</html>