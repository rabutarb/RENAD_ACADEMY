<?php
session_start();
$servername = "isproject.org";
$username = "RenadAcademy";
$password = "RahafSaraMahaAlnada";
$dbname = "RENAD_ACADEMY";
        
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo $_SESSION['username1'];
echo $_GET['id'];
$sql_get_name = "SELECT Subject_name FROM TEACHER_CLASS_IMAGES WHERE TeacherUsername ='$_SESSION[username1]' AND Image_id=$_GET[id]"; 
$result_get_name = $conn->query($sql_get_name);

if ($result_get_name->num_rows > 0) {
  // output data of each row
  while($row = $result_get_name->fetch_assoc()) {
      echo $row["Subject_name"];
      echo '<br>';
      $name = ''.$row["Subject_name"].rand().'';
  }
} else {
  echo "0 results";
}
echo $name;
$sql_set_hide = "UPDATE TEACHER_CLASS_IMAGES SET Hide=1, Subject_name='$name' WHERE TeacherUsername ='$_SESSION[username1]' AND Image_id=$_GET[id]";

if ($conn->query($sql_set_hide) === TRUE) {
  echo header("Location: classeslist.php");
} else {
    echo $sql_set_hide;
  echo "Error updating record: " . $conn->error;
}

$conn->close();

?>