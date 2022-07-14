<h2>Student Information</h2>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'school');
$query = "SELECT * FROM students INNER JOIN student_subjects ON students.id = student_subjects.student_id";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);

// echo 'ID: ' . $student['id'] . '<br>';
echo 'First Name: ' . $student['name'] . '<br>';
echo 'Last Name: ' . $student['last_name'] . '<br>';
echo 'Email: ' . $student['email'] . '<br>';
echo 'Date of Birth: ' . $student['date_of_birth'] . '<br>';
echo 'Subject: ' . $student['subject'] . '<br>';
echo 'Semester: ' . $student['semester'] . '<br>';
echo "<a href='student_update.php?id={$student['id']}'>Update</a><br>";
