

<?php
    include("../php/database.php")
    
    
?> 



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2>Login</h2>
      First Name: <br>
      <input type="text" name="firstName"> <br>
      
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

    </form>

</body>
</html>



<?php
    


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName   = filter_input(INPUT_POST, "firstName",   FILTER_SANITIZE_SPECIAL_CHARS);
    $password   = filter_input(INPUT_POST, "password",   FILTER_SANITIZE_SPECIAL_CHARS);
    $subject      = filter_input(INPUT_POST, "subject",      FILTER_SANITIZE_SPECIAL_CHARS);
    $firstStudent = filter_input(INPUT_POST, "firstStudent", FILTER_SANITIZE_SPECIAL_CHARS);
    $secondStudent = filter_input(INPUT_POST, "secondStudent", FILTER_SANITIZE_SPECIAL_CHARS);
    $thirdStudent = filter_input(INPUT_POST, "thirdStudent", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "INSERT INTO registrierungsformular (firstName, password, subject, firstStudent, secondStudent, thirdStudent) 
            VALUES ('$firstName', '$password' '$subject', '$firstStudent', '$secondStudent', '$thirdStudent')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green'>Erfolgreich gespeichert!</p>";
    } else {
        echo "<p style='color:red'>Fehler: " . mysqli_error($conn) . "</p>";
    }

    if (empty($firstName)){
      echo"Please enter your Name";
    } elseif(empty($password)){
      echo"Please enter your right Password";
    }elseif(empty($subject)){
      echo"Please enter your subject";
    }elseif(empty($firstStudent)){
      echo"Please enter the first Student";
    }elseif(empty($secondStudent)){
      echo"Please enter the second Student";
    }elseif(empty($thirdStudent)){
      echo"Please enter the third Student";
    }


    mysqli_close($conn);
}


?>



