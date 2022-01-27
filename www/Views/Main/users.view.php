<?php
namespace App\Core;
use App\Core\Database;
use PDO;
?>

<div class="esgi-section users">
    <div class="esgi-grid">
        <div class="esgi-grid-cell esgi-grid1">
            <div class="esgi-grid-gutter">
                &nbsp;
            </div>
        </div>

        <div class="esgi-grid-cell esgi-grid10">
            <div class="esgi-grid-gutter">
                <div class="esgi-users-tab">
                    <table>
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>En ligne</th>
                                <th>Rôle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $db = new Database();

                                $sql = 'SELECT email, firstname, lastname, status, role FROM User';
                                $prepare = $db->prepare($sql);
                                $result = $prepare->execute();
                                $compare = $prepare->fetchAll(PDO::FETCH_ASSOC);
                                if (!empty($compare) && isset($_SESSION['userID'])) {
                                    foreach ($compare as $nbarray) {
                                        echo "<tr>";
                                        foreach ($nbarray as $key => $value) {
                                            if ($key == "status") {
                                                if ($value == 1) {
                                                    echo "<td class='yes'>&nbsp;</td>";
                                                }else {
                                                    echo "<td class='no'>&nbsp;</td>";
                                                }
                                            }
                                            if ($key == "role") {
                                                if ($value == 1) {
                                                    echo "<td>admin</td>";
                                                }else {
                                                    echo "<td>visiteur</td>";
                                                }
                                            }
                                            if ($key != "role" && $key != "status") {
                                                echo "<td>" . $value . "</td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                }else {
                                    echo "Vous devez être connecté pour consulter cet écran.";
                                }
                            ?>
                        </tbody>
                    </table>
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
