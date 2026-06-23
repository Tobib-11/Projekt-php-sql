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
