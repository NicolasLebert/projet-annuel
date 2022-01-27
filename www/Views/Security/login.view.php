<?php
?>

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
                    <?php
                        if (!isset($_SESSION['userID'])) {
                    ?>
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
                    </form>
                    <?php
                        }else{
                            echo "Vous êtes déjà connecté.";
                        }
                    ?>
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
