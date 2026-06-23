<?php
require_once "../database.php";

$conn = getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <div class="tablesAnzeige">

        <!-- mit for -->
        <!-- Lehrer -->
        <div class="selfMadeAnzeige">
            <div class="anzeigeTablesLinks">
                <h1>Tabelle der Lehrer</h1>

                <table border="1">
                    <tr>
                        <th>LehrerId</th>
                        <th>LehrerName</th>
                        <th>LehrerGeschlecht</th>
                    </tr>

                    <?php $lehrer = mysqli_query($conn, "SELECT LehrerID, LehrerName, LehrerGeschlecht FROM lehrer;"); ?>

                    <?php foreach ($lehrer as $l): ?>
                        <tr>
                            <td><?= $l["LehrerID"] ?></td>
                            <td><?= $l["LehrerName"] ?></td>
                            <td><?= $l["LehrerGeschlecht"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <!-- Schüler -->
            <div class="anzeigeTablesLinks">
                <h1>Tabelle der Schüler</h1>

                <table border="1">
                    <tr>
                        <th>SchuelerID</th>
                        <th>SchülerName</th>
                        <th>Schülergeschlecht</th>
                    </tr>

                    <?php $schueler = mysqli_query($conn, "SELECT SchuelerID, SchuelerName, SchuelerGeschlecht FROM schueler;"); ?>

                    <?php foreach ($schueler as $s): ?>
                        <tr>
                            <td><?= $s["SchuelerID"] ?></td>
                            <td><?= $s["SchuelerName"] ?></td>
                            <td><?= $s["SchuelerGeschlecht"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>


            <!-- Schüler -->
            <div class="anzeigeTablesLinks">
                <h1>Tabelle des Faches</h1>

                <table border="1">
                    <tr>
                        <th>FachID</th>
                        <th>FachnName</th>
                    </tr>

                    <?php $fach = mysqli_query($conn, "SELECT FachID, FachName FROM fach;"); ?>

                    <?php foreach ($fach as $f): ?>
                        <tr>
                            <td><?= $f["FachID"] ?></td>
                            <td><?= $f["FachName"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>



        <!-- mit while
        <?php
        $result = mysqli_query($conn, "SELECT * FROM lehrer");
        ?>
        <table border="1">
            <tr>
                <th>LehrerID</th>
                <th>LehrerName</th>
                <th>LehrerGeschlecht</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['LehrerId'] ?></td>
                    <td><?= $row['LehrerName'] ?></td>
                    <td><?= $row['LehrerGeschlecht'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        -->

        <!-- von ki einfach ganze tabelle -->
        <div class="KIAnzeige">
            <?php
            // Hole alle Tabellennamen
            $tables = mysqli_query($conn, "SHOW TABLES");

            while ($table = mysqli_fetch_array($tables)) {
                $tableName = $table[0];
                echo "<h2>Tabelle: " . $tableName . "</h2>";

                // Hole Spaltennamen
                $columns = mysqli_query($conn, "SHOW COLUMNS FROM `$tableName`");
                echo "<table border='1'><tr>";

                while ($column = mysqli_fetch_assoc($columns)) {
                    echo "<th>" . $column['Field'] . "</th>";
                }

                echo "</tr>";

                // Hole alle Daten
                $data = mysqli_query($conn, "SELECT * FROM `$tableName`");

                while ($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>";

                    foreach ($row as $cell) {
                        echo "<td>" . $cell . "</td>";
                    }

                    echo "</tr>";
                }

                echo "</table><br>";
            }
            ?>
        </div>

        <a href="../first_site/index.php">
            <button class="buttonBackAnzeige">
                hier gehts zurück
            </button>
        </a>

    </div>
</body>

</html>