<html>
    <head>

    </head>
    <body>
<?php
session_start();
$_SESSION["RFID"] = $_POST['srfid'];

$SRFID = $_POST['srfid'];

$scheduleID = "SELECT * FROM STUDENT_SCHEDULE WHERE Student_RFID='$SRFID'";
// Schedule_id


$servername = "isproject.org";
$username = "RenadAcademy";
$password = "RahafSaraMahaAlnada";
$dbname = "RENAD_ACADEMY";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$result1 = $conn->query($scheduleID);
$show = 'yes';
while($row = $result1->fetch_assoc()) {
    if($row['active']==1){
      $schedule_id = $row['Schedule_id'];
    //   echo $schedule_id = $row['Schedule_id'];
    //   echo "<br>";
      if ($row['show_text'] == 0){
            $show = 'no';
        }
    }
}

#GETTING SCHEDULE START TIME
$scheduleStart = "SELECT * FROM SCHEDULE WHERE ID='$schedule_id'";
$result2 = $conn->query($scheduleStart);
while($row = $result2->fetch_assoc()) {
      $schedule_start = $row['start_time'];
      echo $schedule_start;
    //   echo "<br>";
}

#GETTING SYSTEM TIME
// echo "hello";
echo '<script type=type=\"text/javascript\">
          document.write("hi");
          var today = new Date();
          document.write(today);
          var timeOnly = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                    document.write(timeOnly);
          var schedule = "<?php json_encode($schedule_start); ?>";
          var scheduleTime = new Date("<?php echo $schedule_start; ?>);
          document.write(timeOnly);
          var changeInTime = timeOnly - scheduleTime;
          document.write(changeInTime);
</script>';


#TESTING WITH PHP TIME AS IF ITS JS TIME
echo "<br>";
$my_time = '7:00:00';
$new_time= strtotime($my_time);
echo "this is 'current' time";
echo "<br>";
$currTime = date('h:i:s',$new_time);
echo $currTime;

echo "<br>";


$var = "<script>document.writeln(timeOnly);</script>";
echo "<br>";
echo "this is it";
echo "<br>";
echo $var;
echo "<br>";
echo "this is when the schedule starts";
echo "<br>";
echo $schedule_start;
echo "<br>";
echo "this the time difference";
echo "<br>";
$timme= $currTime-$schedule_start;
$theTime = $timme*60;
echo $theTime;
echo "<br>";


#time diff between php and js
echo "Var value is".$var;
echo"<br>";
echo "schedule start time is".$schedule_start;
echo"<br>";
$timeDiff = $var - $schedule_start;
echo "This is the difference of var and start time";
echo "<br>";
echo $timeDiff;

#CLASS DURATIONS AND WHICH CLASS WE'RE AT
$x = 0;
$noClass = 0;
      for ($i = 1; $i < 11; $i++){
        //   while($x<$theTime){
        #getting the durations
              $sql_get_duration = "SELECT class_duration$i FROM SCHEDULE WHERE ID = $schedule_id";
          $result_get_duration = $conn->query($sql_get_duration);
          #if its null set to 0
        if ($result_get_duration->num_rows > 0) {
             while($row = $result_get_duration->fetch_assoc()) {
                 if ($row['class_duration'.$i] == null){
                     $row['class_duration'.$i] = 0;
                 }
                 #here start adding
                 while($x<$theTime){
                  $x= $x + $row['class_duration'.$i];
                  $noClass= $noClass+1;
                 }

                 echo $noClass." how many classes";
                 echo "<br>";
                 echo $x." how much time spent";
             }
        }

        //   echo "helllooooo";
        //   echo  $result_get_duration;
          }
        if ($result_get_id->num_rows > 0) {
             while($row = $result_get_id->fetch_assoc()) {
                 array_push($image_id, $row['class'.$i]);
             }
        
      }





$sName =  "SELECT * FROM STUDENT WHERE RFID='$SRFID'";
$name = $conn->query($sName);
if(mysqli_num_rows($name) == 1){
    $row=mysqli_fetch_assoc($name);
    echo"<h1>". $row['First_Name'] ." ". $row['Last_name']."'s schedule"."</h1>";
}





$image_id = array();
#shows whole schedule
      for ($i = 1; $i < 11; $i++){
          $_SESSION['current_class'] = 'class'.$i;
              $sql_get_id = "SELECT class$i FROM SCHEDULE WHERE ID = $schedule_id";
              
          $result_get_id = $conn->query($sql_get_id);
        
        if ($result_get_id->num_rows > 0) {
             while($row = $result_get_id->fetch_assoc()) {
                 array_push($image_id, $row['class'.$i]);
             }
        }
      }
      #retrieving images
        echo "<table style=width:100% id = scheduleTable text-align = center>";
        $c = 0;
        if (count($image_id)%3 == 0) {$divide = 3;}
        if (count($image_id)%5 == 0) {$divide = 5;}
        if (count($image_id)%2 == 0) {$divide = 4;}
          for ($i = 0; $i < count($image_id); $i++){
              $current = $image_id[$i];
              $sql_get_image = "SELECT * FROM IMAGES WHERE ID = $current";
              $result_get_image = $conn->query($sql_get_image);
              while($row = $result_get_image->fetch_assoc()) {
                  $img = $row["image_directory"];
                  if ($show == 'no'){ $text = '';} 
              elseif ($show == 'yes') {$text = $row['image_subtext'];}
              if ($i % $divide == 0){
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td>
                  <div class=container mt-3>
                    <div class=card style=width:250px>
                        <img class=card-img-top src=".$img." alt=Card image style=width:100%;height:200px>
                            <div class=card-body><h4 class=card-title>".$text."</h4>
                            </div>
                        </div>
                    </td>";
              } else {
              echo "<tr>
                        <div class=container mt-3> 
                            <div class=card style=width:250px>
                                 <img class=card-img-top src=".$img." alt=Card image style=width:100%;height:200px>
                             <div class=card-body>
                                <h4 class=card-title>".$text."</h4>
                            </div>
                        </div>
                    </tr>"; 
                }
                  
            }
              $c++;
          }

        echo "</table>";
        $conn->close();
      ?>

      </body>
</html>

?>