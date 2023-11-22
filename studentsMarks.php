<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <style>
      *{
        text-decoration: none;
        margin: 2px;
      }
      /* .tableView{
        border: 2px solid black;
      } */
    </style>
</head>
<body>
    <form action="studentsMarksCreate.php" method="post">
        <label for="studentName">Enter Student Name</label>
        <input type="text" name="studentName"><br>
        <label for="studentClass">Enter Student Class</label>
        <input type="text" name="studentClass"><br>
        <label for="studentRoll">Enter Student Roll No.</label>
        <input type="number" name="studentRoll"><br>
        <label for="">Enter the marks of following subjects</label><br>
        <label for="math">Math</label>
        <input type="text" name="math"><br>
        <label for="science">Science</label>
        <input type="text" name="science"><br>
        <label for="computer">Computer</label>
        <input type="text" name="computer"><br>
        <label for="english">English</label>
        <input type="text" name="english"><br>
        <label for="nepali">Nepali</label>
        <input type="text" name="nepali"><br><br>
        <button type="submit">SUBMIT</button><br><br>
    </form>

    <?php
$conn = mysqli_connect("localhost", "root", "", "studentsMarks");

if (isset($_GET["delete"])) {
  $studentId = $_GET["delete"]; //id value

  $sql = "DELETE FROM studentsdata WHERE id = '$studentId'";
  
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}

$query = "SELECT * FROM studentsdata";
$result = mysqli_query($conn, $query);
?>

  <br><table class="tableView" border="2px">
  <thead>
   <th>Name</th>
   <th>Class</th>
   <th>Roll No.</th>
   <th>Math</th>
   <th>Science</th>
   <th>Computer</th>
   <th>English</th>
   <th>Nepali</th>
   <th>Total</th>
   <th>Percentage</th>
   <th>ACTION</th>
  </thead>
  <tbody>
    <?php
  while ($data = mysqli_fetch_assoc($result)) {
    $total= $data['science']+$data['nepali']+$data['english']+$data['math']+$data['computer'];
    $percentage = ($total/500)*100; ?>
<tr>
   <td><?php echo $data['studentName'] ?></td>
   <td><?php echo $data['studentClass'] ?></td>
   <td><?php echo $data['studentRoll'] ?></td>
   <td><?php echo $data['math'] ?></td>
   <td><?php echo $data['science'] ?></td>
   <td><?php echo $data['computer'] ?></td>
   <td><?php echo $data['english'] ?></td>
   <td><?php echo $data['nepali'] ?></td>
   <td><?php echo $total ?></td>
   <td><?php echo $percentage ?>%</td>
   <td><a href="studentsUpdate.php?id=<?php echo $data["id"]; ?>">Edit </a><a href="?delete=<?php echo $data["id"]; ?>"> Delete</a></td>
   </tr>
<?php } ?>

  </tbody>
</table>
<?php 
mysqli_close($conn);
?>
</body>
</html>