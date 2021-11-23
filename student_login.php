<?php
session_start();
?>
<?php

$servername = "isproject.org";
$username = "RenadAcademy";
$password = "RahafSaraMahaAlnada";
$dbname = "RENAD_ACADEMY";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$_SESSION["RFID"] = $_POST["RFID"];

$sql = "SELECT First_Name FROM STUDENT WHERE STUDENT = '$_SESSION[RFID]'";

$result = $conn->query($sql);
echo $resultIssql;
?>


<!--login page-->
<!DOCTYPE html>
<html>
<head>
    <title> LOGIN </title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
         <!--<link rel="stylesheet" href="loginStyle.css">-->

</head>
<body>
     <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            
          <ul class="navbar-nav">
            <li class="nav-item">
              
            </li>
           <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <a class="navbar-brand" href="#">
            <img src="renad_logo.png" alt="Avatar Logo" style="width:250px;" class="rounded-pill"> 
          </a>
        </div>
      </nav>

  <form action="logged_in.php" method="post">
      <h2>Scan your bracelet!</h2>
      <?php if(isset($GET['error'])){ ?>
      <p><?php echo $GET['error'];?></p>
      <?php } ?>
      <input type="text" name="srfid">
      <button type="submit">Login</button>
  </form>
</body>
    <footer>
        <p>
            Copyright for Carnegie Mellon University <span>&#169;</span>
        <br>
        </p>
    </footer>

</html>
