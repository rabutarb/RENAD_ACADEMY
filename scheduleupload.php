<?php
session_start();
if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
}
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

// $studentRFID = $_GET['RFID'];
// $teacherUserName = $_GET['TeacherUserName'];
// $sql = "SELECT * FROM STUDENT WHERE RFID = '$_SESSION[studentRFID]'";

// $resultIssql = $conn->query($sql);

// if ($resultIssql->num_rows > 0){
//     while($row = $resultIssql->fetch_assoc()){
//         $fname = $row["First_Name"];
//         $lname = $row["Last_name"];
//         $sadmin = $row["AdminUsername"];
//         $sgrade = $row["GradeLevel"];
//         $sscetion = $row["GradeSection"];
//     }    
// }    
?>
<!DOCTYPE html>
<html>

<head>
 <title>Upload Schedule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet"
        type="text/css"
        href="scheduleuploadstyle.css" />

</head>

<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="teacher_homepage.php">Home</a>
            </li>
           <li class="nav-item">
              <a class="nav-link active" href="classeslist.php">My Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacherstudent.php">My Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="scheduleshomepage.php">My Schedules</a>
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

	<div id="content" align="center">
	    <h2> 
            Upload an Image for a Class
        </h2>
        <p>
            The name inserted will be the same name that would be displayed in the student schedule if you choose to include text in their schedule
        </p>
	<!--	<form method="POST"-->
	<!--		action=""-->
	<!--		enctype="multipart/form-data">-->
	<!--		<input type="file"-->
	<!--			name="uploadfile"-->
	<!--			value="" />-->

	<!--		<div>-->
	<!--			<button type="submit"-->
	<!--					name="upload">-->
	<!--			UPLOAD-->
	<!--			</button>-->
	<!--		</div>-->
	<!--	</form>-->
	<!--</div>-->
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="upload.php"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image"
                  >
                    <br><br>
            <label for="Subject-name">Class name:</label><br>
            <input type="text" 
                   name="Subject-name"
                   id="Subject-name"> 
                   
                   <br><br> 

           <input type="submit" 
                  name="submit"
                  value="Upload"
                  class="btn-outline-lg">
                  
                  <br><br>
     	
     </form>
</body>

<?php
error_reporting(0);
?>
<?php
// $msg = "";

// // If upload button is clicked ...
// if (isset($_POST['upload'])) {

// 	$filename = $_FILES["uploadfile"]["name"];
// 	$tempname = $_FILES["uploadfile"]["tmp_name"];	
// 	$folder = "image/".$filename;
		
// 	$db = mysqli_connect("localhost", "root", "", "photos");

// 		// Get all the submitted data from the form
// 		$sql = "INSERT INTO image (filename) VALUES ('$filename')";

// 		// Execute query
// 		mysqli_query($db, $sql);
		
// 		// Now let's move the uploaded image into the folder: image
// 		if (move_uploaded_file($tempname, $folder)) {
// 			$msg = "Image uploaded successfully";
// 		}else{
// 			$msg = "Failed to upload image";
// 	}
// }
// $result = mysqli_query($db, "SELECT * FROM image");
// ?>


</html>
