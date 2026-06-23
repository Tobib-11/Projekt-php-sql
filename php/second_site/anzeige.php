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