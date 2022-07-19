<?php
$nameErr = $emailErr = $lastNameErr = $dateOfBirthErr = "";
$name = $email = $lastName = $dateOfBirth = $studentSubject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["first_name"];    
  }

  if (empty($_POST["last_name"])) {
    $lastNameErr = "Last Name is required";
  } else {
    $lastName = $_POST["last_name"];
  }

  if (empty($_POST["date_of_birth"])) {
    $dateOfBirthErr = "Date of Birth is required";
  } else {
    $dateOfBirth = $_POST["date_of_birth"];
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  $studentSubject = $_POST['subjects'];

  $id = $_GET['id'];

  $studentSubject = $_POST['subjects'];
  $studentSemester = $_POST['semester'];

  $conn = mysqli_connect('localhost', 'root', '', 'school');
  $query = "UPDATE students SET name = '$name', last_name = '$lastName', date_of_birth = '$dateOfBirth', email = '$email' WHERE students.id = '$id'";
  $result = mysqli_query($conn, $query);
  
  if ($result)
  echo 'Successfully inserted in the DB!';
  else
  echo 'Problem inserting into the DB.';
}

  $last_id = $conn->insert_id;
  $query1 =  "UPDATE student_subjects SET subject = '$studentSubject', semester = '$studentSemester' WHERE student_subjects.id = '$last_id'";
  $result1 = mysqli_query($conn, $query1);

  if ($result1)
  echo 'Successfully inserted in the DB!';
  else
  echo 'Problem inserting into the DB.';
?>

<h2>Student Update Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="first_name" value="<?php echo $name;?>">
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="last_name" value="<?php echo $lastName;?>">
  <span class="error"><?php echo $lastNameErr;?></span>
  <br><br>
  Date Of Birth: <input type="date" name="date_of_birth" value="<?php echo $dateOfBirth;?>">
  <span class="error"><?php echo $dateOfBirthErr;?></span>
  <br><br>
  E-mail: <input type="email" name="email" value="<?php echo $email;?>">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Subjects: <select name="subjects" id="subjects">
    <option value="mathematics">Mathematics</option>
    <option value="english">English</option>
    <option value="science">Science</option>
    <option value="art">Art</option>
  </select>
  <br><br>
  Semester: <select name="semester" id="semester">
    <option value="1">1</option>
    <option value="2">2</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit"><br>
</form>