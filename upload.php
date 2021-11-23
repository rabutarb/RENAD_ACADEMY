
<?php 
session_start();
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {


    
    $servername = "isproject.org";
    $username = "RenadAcademy";
    $password = "RahafSaraMahaAlnada";
    $dbname = "RENAD_ACADEMY";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    
// 	echo  $image_subText;

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	$image_subText = $_POST['Subject-name'];

	if ($error === 0) {
		if ($img_size > 400000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'schedule_uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				// $image_subText = $_POST['Subject-name'];
				// echo  $_POST['Subject-name'];
				$sql = "INSERT INTO IMAGES(image_directory, image_name, image_subtext) 
				        VALUES('$img_upload_path', '$new_img_name', '$image_subText')";
				// mysqli_query($conn, $sql);
				$conn->query($sql);
				
				$last_id = mysqli_insert_id($conn);
				//     echo "New record created successfully. Last inserted ID is: " . $last_id;
				// } else {
				//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				// }
				
				$sql_teacher_image = "INSERT INTO TEACHER_CLASS_IMAGES(TeacherUsername, Subject_name, Image_id) VALUES (
				    '$_SESSION[username1]','$image_subText', $last_id)"; 
				// mysqli_query($conn, $sql_update_student);
				
				echo '<br>';
				echo $sql_teacher_image; 
				$conn->query($sql_teacher_image);
				// echo $sql_update_student;
				// echo "Set the previous to inactive ". $_SESSION['studentRFID']; 
				
				// $sql_insertinto_studentSchedule = "INSERT INTO STUDENT_SCHEDULE(Student_RFID, Schedule_id,  active)  VALUES('$_SESSION[studentRFID]', '$last_id', 1)";
				// $conn->query($sql_insertinto_studentSchedule);
		  //    //  mysqli_query($conn, $sql_insertinto_studentSchedule);
		  //      echo $sql_insertinto_studentSchedule; 
				
				header("Location: classeslist.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: scheduleupload.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: scheduleupload.php?error=$em");
	}

}else {
	header("Location: scheduleupload.php");
}