<?php
require_once "../database.php";

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // this is only executed when the submit button is clicked (because of POST!)
  $firstName   = filter_input(INPUT_POST, "firstName",   FILTER_SANITIZE_SPECIAL_CHARS);
  $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
  $password   = filter_input(INPUT_POST, "password",   FILTER_SANITIZE_SPECIAL_CHARS);
  $subject      = filter_input(INPUT_POST, "subject",      FILTER_SANITIZE_SPECIAL_CHARS);
  $firstStudent = filter_input(INPUT_POST, "firstStudent", FILTER_SANITIZE_SPECIAL_CHARS);
  $secondStudent = filter_input(INPUT_POST, "secondStudent", FILTER_SANITIZE_SPECIAL_CHARS);
  $thirdStudent = filter_input(INPUT_POST, "thirdStudent", FILTER_SANITIZE_SPECIAL_CHARS);
  //INSERT INTO lehrer (LehrerName, LehrerGeschlecht)
  //VALUES ('Goete', 'M');
  $sql = "INSERT INTO lehrer(LehrerName, LehrerGeschlecht) VALUES ('$firstName', '$gender')";
  //genau so auch die anderen speichern mit insert into
  if (mysqli_query($conn, $sql)) {
    echo "<p style='color:green'>Erfolgreich gespeichert!</p>";
  } else {
    echo "<p style='color:red'>Fehler: " . mysqli_error($conn) . "</p>";
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
</head>

<body>
  <?php $classes = mysqli_query($conn, " SELECT LehrerName FROM lehrer; "); ?>
  <ul>
    <?php foreach ($classes as $class): ?>
      <li>Lehrer: <?= $class["LehrerName"] ?></li>
    <?php endforeach; ?>
  </ul>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">555
    <h2>Login</h2>
    First Name: <br>
    <input type="text" name="firstName"> <br>

    <!--auswahl daraus machen von groß M und groß W-->
    Your gender: <br>
    <input type="text" name="gender"> <br>

    Password: <br>
    <input type="password" name="password"> <br>

    Subject: <br>
    <input type="text" name="subject"> <br>

    First Student: <br>
    <input type="text" name="firstStudent"> <br>

    Second Student: <br>
    <input type="text" name="secondStudent"> <br>

    Third Student: <br>
    <input type="text" name="thirdStudent"> <br>
    <br>
    <input type="submit" name="submit" value="Save you data">
    <input type="reset" name="reset" value="Reset your Data here">

      <a href="../second_site/anzeige.php">
        zur nächsten seite
      </a>
  </form>

</body>

</html>

<?php
mysqli_close($conn); ?>