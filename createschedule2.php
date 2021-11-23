<html>
<head>
  <title>Create Schedule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="teacher_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="classeslist.php">My Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacherstudent.php">My Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="scheduleshomepage.php">My Schedules</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log out</a>
            </li>
          </ul>
          <a class="navbar-brand" href="teacher_homepage.php">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>

<?php

// list of all the classes available 
$classes_list = array("Math", "Science", "Arabic", "Music");
$arrlength = count($classes_list);
echo $arrlength;

// $servername = "";
// $username = "";
// $password = "";
// $dbname = "";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// } 
// // change this to ticket 
// // do the same for customers and guests 
// // make sure that user is admin (if statement)

// $sql = "SELECT 'Name' from Class";

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
    
//   while($row = $result->fetch_assoc()) {
//     array_push($classes_list, $row["Name"]);
// }
// } else {
//     echo "";
// }
// $conn->close();

echo "<form>
  <div class=form-group>
    <label for=exampleInputName>Class Name </label>
    <div class=dropdown>
    <button class=btn btn-primary dropdown-toggle type=button data-toggle=dropdown>Select Class
    <span class=caret></span></button>
    <ul class=dropdown-menu>";
    
    for ($i = 0; $i < array_count_values($classes_list); ++$i) {
        echo "<li>".$classes_list[$i] . "</li>";
     }
echo "</ul>
  </div>
</div>
  </div>
  <div class=form-group>
    <label for=exampleInputFrom>From</label>
    <input type=time class=form-control id=exampleInputFrom>
  </div>
  <div class=form-group>
    <input type=To class=form-control id=exampleInputTo>
    <input type=time class=form-control id=exampleInputTo>
  </div>
  <button type=submit class=btn btn-primary>Submit</button>
</form>";


?>



</body>
</html>
