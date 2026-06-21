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
</head>

<body>
    <table>
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
    <a href="../first_site/index.php">
        hier geht zurück
    </a>
</body>

</html>