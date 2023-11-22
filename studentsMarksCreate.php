<?php
$conn = mysqli_connect("localhost", "root", "", "studentsmarks");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $studentName = $_POST['studentName'];
  $studentClass = $_POST['studentClass'];
  $studentRoll = $_POST['studentRoll'];
  $math = $_POST['math'];
  $computer = $_POST['computer'];
  $science = $_POST['science'];
  $english = $_POST['english'];
  $nepali = $_POST['nepali'];


//    $query ="CREATE TABLE IF NOT EXISTS studentsData(id int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
//    studentName varchar(200) NOT NULL,
//    studentClass varchar(50) NOT NULL,
//    studentRoll varchar(50) NOT NULL,
//    math varchar(50) NOT NULL,
//    computer varchar(50) NOT NULL,
//    science varchar(50) NOT NULL,
//    english varchar(50) NOT NULL,
//    nepali varchar(50) NOT NULL)";


  $query = "INSERT INTO studentsData (studentName, studentClass, studentRoll, math, computer, science, english, nepali) VALUES ('$studentName', '$studentClass', '$studentRoll', '$math', '$computer', '$science', '$english', '$nepali')";
  mysqli_query($conn, $query);
  

  mysqli_close($conn);
  header("Location: studentsMarks.php");
}
?>
