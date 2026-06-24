<?php
require_once "../database.php";

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // this is only executed when the submit button is clicked (because of POST!)
  $firstName   = filter_input(INPUT_POST, "firstName",   FILTER_SANITIZE_SPECIAL_CHARS);
  $Lehrergender = filter_input(INPUT_POST, "teachGender", FILTER_SANITIZE_SPECIAL_CHARS);
  $password   = filter_input(INPUT_POST, "password",   FILTER_SANITIZE_SPECIAL_CHARS);
  $subject      = filter_input(INPUT_POST, "subject",      FILTER_SANITIZE_SPECIAL_CHARS);
  $firstStudent = filter_input(INPUT_POST, "firstStudent", FILTER_SANITIZE_SPECIAL_CHARS);
  $firstStudentgender = filter_input(INPUT_POST, "gender1", FILTER_SANITIZE_SPECIAL_CHARS);
  $secondStudent = filter_input(INPUT_POST, "secondStudent", FILTER_SANITIZE_SPECIAL_CHARS);
  $secondStudentgender = filter_input(INPUT_POST, "gender2", FILTER_SANITIZE_SPECIAL_CHARS);
  $thirdStudent = filter_input(INPUT_POST, "thirdStudent", FILTER_SANITIZE_SPECIAL_CHARS);
  $thirdStudentgender = filter_input(INPUT_POST, "gender3", FILTER_SANITIZE_SPECIAL_CHARS);

  //INSERT INTO lehrer (LehrerName, LehrerGeschlecht)
  //VALUES ('Goete', 'M');
  $lehrer = "INSERT INTO lehrer(LehrerName, LehrerGeschlecht) VALUES ('$firstName', '$Lehrergender')";
  $schueler1 = "INSERT INTO schueler(SchuelerName, SchuelerGeschlecht) VALUES ('$firstStudent', '$firstStudentgender')";
  $schueler2 = "INSERT INTO schueler(SchuelerName, SchuelerGeschlecht) VALUES ('$secondStudent', '$secondStudentgender')";
  $schueler3 = "INSERT INTO schueler(SchuelerName, SchuelerGeschlecht) VALUES ('$thirdStudent', '$thirdStudentgender')";
  $fach = "INSERT INTO fach(FachName) VALUES ('$subject')";
 

  //genau so auch die anderen speichern mit insert into
  //lehrer
  if (mysqli_query($conn, $lehrer)) {
    echo "<p style='color:green'>Der Lehrer wurde gespeichert!</p>";
  } else {
    echo "<p style='color:red'>Fehler beim Speichern des Schülers: " . mysqli_error($conn) . "</p>";
  }
  //Schueler1
  if (mysqli_query($conn, $schueler1)) {
    echo "<p style='color:green'>Schüler1 wurde gespeichert!</p>";
  } else {
    echo "<p style='color:red'>Fehler beim Speichern der Schüler: " . mysqli_error($conn) . "</p>";
  }
  //schueler2  
  if (mysqli_query($conn, $schueler2)) {
    echo "<p style='color:green'>Schüle2r wurde gespeichert!</p>";
  } else {
    echo "<p style='color:red'>Fehler beim Speichern der Schüler: " . mysqli_error($conn) . "</p>";
  }
  //schueler3
    if (mysqli_query($conn, $schueler3)) {
    echo "<p style='color:green'>Schüler3 wurde gespeichert!</p>";
  } else {
    echo "<p style='color:red'>Fehler beim Speichern der Schüler: " . mysqli_error($conn) . "</p>";
  }
  //Fach
  if (mysqli_query($conn, $fach)) {
    echo "<p style='color:green'>Das Fach wurde gespeichert!</p>";
  } else {
    echo "<p style='color:red'>Fehler beim Speichern des Faches: " . mysqli_error($conn) . "</p>";
  }

  //überprüfung ob alle notwendigen infos dabei sind  

  // if (empty($firstName)){
  //   echo"Please enter your Name";
  // } elseif(empty($password)){
  //   echo"Please enter your right Password";
  // }elseif(empty($subject)){
  //   echo"Please enter your subject";
  // }elseif(empty($firstStudent)){
  //   echo"Please enter the first Student";
  // }elseif(empty($secondStudent)){
  //   echo"Please enter the second Student";
  // }elseif(empty($thirdStudent)){
  //   echo"Please enter the third Student";
  // }else{
  //   $hash= password_hash($password, PASSWORD_DEFAULT);
  //   $sql = "Insert Into x(y,z)
  //           Values ('$username','$hash')";


  //   try{
  //   mysqli_query($conn, $sql);
  //        echo"you are now getting based in the database";
  //   }
  //   catch(mysqli_sql_exception){
  //       echo"that username is already taken";
  //   }
  // }

}
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
<!-- 
  <?php $classes = mysqli_query($conn, "SELECT LehrerName FROM lehrer;"); ?>
  <ul>
    <?php foreach ($classes as $class): ?>
      <li>Lehrer: <?= htmlspecialchars($class["LehrerName"]) ?></li>
    <?php endforeach; ?>
  </ul>
-->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="formularForInformationsIndex">
    <h2>Datenspeicher</h2>
      First Name: <br>
      <input type="text" name="firstName"> <br>

      <!--auswahl daraus machen von groß M und groß W-->
      <label for="lehrer_geschlecht">Geschlecht:</label>
      <br>
        <select id="lehrer_geschlecht" name="lehrer_geschlecht" required>
          <option value="" disabled selected>-- Bitte Geschlecht wählen --</option>
          <option value="m">M</option>
          <option value="w">W</option>
        </select>
      <hr>
        
      Password: <br>
      <input type="password" name="password"> <br>
  <hr>
      Subject: <br>
      <input type="text" name="subject"> <br>
  <hr>
      First Student: <br>
      <input type="text" name="firstStudent"> <br>
      <label for="gener2">Geschlecht:</label><br>
        <select id="gender2" name="gender1" required>
          <option value="" disabled selected>-- Bitte Geschlecht wählen --</option>
          <option value="m">M</option>
          <option value="w">W</option>
      </select><br>
  <hr>

      Second Student: <br>
      <input type="text" name="secondStudent"> <br>
      <label for="gender2">Geschlecht:</label><br>
          <select id="gender2" name="gender2" required>
              <option value="" disabled selected>-- Bitte Geschlecht wählen --</option>
              <option value="m">M</option>
              <option value="w">W</option>
          </select><br>
  <hr>
      Third Student: <br>
      <input type="text" name="thirdStudent"> <br>
      <label for="gender3">Geschlecht:</label><br>
        <select id="gender3" name="gender3" required>
            <option value="" disabled selected>-- Bitte Geschlecht wählen --</option>
            <option value="m">M</option>
            <option value="w">W</option>
        </select>
        <br>
  <hr>



      <br>
     <form>
          <input type="submit" name="submit" value="Save you data">
          <input type="reset" name="reset" value="Reset your Data here">

        <a href="../second_site/anzeige.php">
        
                <input class="buttonTableIndex" type="nextSide" value="Next Side">
        
              </a>
    </form>
</div>
</body>

</html>

<?php
mysqli_close($conn); ?>