<h2>Display Students</h2>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'school');
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($students as $student) {
    echo 'First Name: ' . $student['name'] . '<br>';
    echo 'Last Name: ' . $student['last_name'] . '<br>';
    echo 'Email: ' . $student['email'] . '<br>';
    echo 'Date of Birth: ' . $student['date_of_birth'] . '<br>';
    echo '<a href="student_information.php">More</a>' . '<br>';
    echo '<hr>';
}