<h2>Student Information</h2>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'school');
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);

echo 'First Name: ' . $student['name'] . '<br>';
echo 'Last Name: ' . $student['last_name'] . '<br>';
echo 'Email: ' . $student['email'] . '<br>';
echo 'Date of Birth: ' . $student['date_of_birth'] . '<br>';
echo '<a href="student_update.php">Update</a>' . '<br>';
