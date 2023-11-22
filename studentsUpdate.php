<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <style>
      * {
        text-decoration: none;
        margin: 2px;
      }
    </style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "studentsmarks");

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $studentName = $_POST['studentName'];
  $studentClass = $_POST['studentClass'];
  $studentRoll = $_POST['studentRoll'];
  $math = $_POST['math'];
  $computer = $_POST['computer'];
  $science = $_POST['science'];
  $english = $_POST['english'];
  $nepali = $_POST['nepali'];
  $studentId = $_POST['id'];

  $query = "UPDATE studentsdata SET studentName = '$studentName',
  studentClass = '$studentClass',
  studentRoll = '$studentRoll',
  math = '$math',
  computer = '$computer',
  science = '$science',
  english = '$english',
  nepali = '$nepali' WHERE id = '$studentId' ";

  if (mysqli_query($conn, $query)) {
    header("Location: studentsMarks.php");
    exit();
  } else {
    echo "Error updating data: " . mysqli_error($conn);
  }
}

if (isset($_GET["id"])) {
  $studentId = $_GET["id"];
  $query = "SELECT * FROM studentsdata WHERE id='$studentId'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
  } else {
    echo "No student found with the specified ID";
    exit();
  }
} else {
  echo "No student ID specified";
  exit();
}
?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
    <label for="studentName">Enter Student Name</label>
    <input type="text" name="studentName" value="<?php echo $data["studentName"]; ?>"><br>
    <label for="studentClass">Enter Student Class</label>
    <input type="text" name="studentClass" value="<?php echo $data["studentClass"]; ?>"><br>
    <label for="studentRoll">Enter Student Roll No.</label>
    <input type="number" name="studentRoll" value="<?php echo $data["studentRoll"]; ?>"><br>
    <label for="">Enter the marks of following subjects</label><br>
    <label for="math">Math</label>
    <input type="text" name="math" value="<?php echo $data["math"]; ?>"><br>
    <label for="science">Science</label>
    <input type="text" name="science" value="<?php echo $data["science"]; ?>"><br>
    <label for="computer">Computer</label>
    <input type="text" name="computer" value="<?php echo $data["computer"]; ?>"><br>
    <label for="english">English</label>
    <input type="text" name="english" value="<?php echo $data["english"]; ?>"><br>
    <label for="nepali">Nepali</label>
    <input type="text" name="nepali" value="<?php echo $data["nepali"]; ?>"><br><br>
    <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
    <button type="submit">SUBMIT</button><br><br>
</form>

<?php 
mysqli_close($conn);
?>
</body>
</html>
