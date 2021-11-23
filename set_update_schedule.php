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
    if (!isset($_SESSION['username1'])){
    header("Location: login.php"); 
    }
    
    if ($_POST['show_text'] != null){
                 $showtext = 1;
             } else {
                 $showtext = 0;
             }
             $classes = array();
             $classes_imageID = array();
             for ($x = 1; $x <= 10; $x++){
                $id = "class".$x;
                if($_POST[$id] == ''){
                    array_push($classes,'NULL');
                    array_push($classes_imageID, 'NULL');
                } else {
                    array_push($classes,$_POST[$id]);
                    $current = $x-1;
                    $sql_get_image_id = "SELECT Image_id FROM TEACHER_CLASS_IMAGES WHERE Subject_name = '$classes[$current]' AND TeacherUsername = '$_SESSION[username1]'";
                // echo $sql_get_image_id;
                // echo '<br>';
                $result_get_image_id = $conn->query($sql_get_image_id);
                if ($result_get_image_id->num_rows > 0) {
                    while($row = $result_get_image_id->fetch_assoc()){
                        array_push($classes_imageID, $row['Image_id']);
                    }
                }
            }
                
                
                // echo '<br>';
            }
            echo '<br>';
            // print_r($classes_imageID);
            $sql_insert = "UPDATE SCHEDULE 
                            SET Schedule_name = '$_POST[schedule_name]',
                                show_text = $showtext,
                                start_time = '$_POST[start_time]',
                                end_time = '$_POST[end_time]',
                                class1 = $classes_imageID[0],
                                class2 = $classes_imageID[1],
                                class3 = $classes_imageID[2],
                                class4 = $classes_imageID[3],
                                class5 = $classes_imageID[4],
                                class6 = $classes_imageID[5],
                                class7 = $classes_imageID[6],
                                class8 = $classes_imageID[7],
                                class9 = $classes_imageID[8],
                                class10 = $classes_imageID[9]
                            WHERE ID = $_SESSION[Schedule_id]";    
            
            // INSERT INTO SCHEDULE (Schedule_name,Created_by,show_text,start_time,end_time,class1,class2,class3,class4,class5,class6,class7,class8,class9,class10) VALUES ('$_POST[schedule_name]', '$_SESSION[username1]', $showtext, '$_POST[start_time]', '$_POST[end_time]', $classes_imageID[0], $classes_imageID[1],$classes_imageID[2],$classes_imageID[3],$classes_imageID[4],$classes_imageID[5],$classes_imageID[6],$classes_imageID[7],$classes_imageID[8],$classes_imageID[9])";
            // echo $sql_insert;
            if ($conn->query($sql_insert) === TRUE) {
                $_SESSION['last_id'] = $conn->insert_id;
                header("Location: viewschedule.php?id=".$_SESSION['Schedule_id']."");
            }    
?>