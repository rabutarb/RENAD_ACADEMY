<html>
    <head>
        <link rel="stylesheet" href="studentStyle.css">
 <script>
 
 function myFunction(){
 card = document.getElementById('theImage');
  card.classList.toggle('fade');
} 
</script>
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
#getting schedule id
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
          for ($i = 3; $i < count($image_id); $i++){
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
                    <h1> Next class </h1>
                        <img class=card-img-top id=theImage src=".$img." alt=Card image style=width:100%;height:200px>
                        <input type='text' name='srfid'>
                         <button type='submit' onClick='myFunction()'>Done with this class</button>
                            <div class=card-body><h4 class=card-title>".$text."</h4>
                            </div>
                        </div>
                    </td>";
              } else {
              echo "<tr>
                        <div class=container mt-3> 
                            <div class=card style=width:250px>
                                          <h1>Next class </h1>
                                 <img class=card-img-top id=theImage src=".$img." alt=Card image style=width:100%;height:200px>
                                 <form action='class5.php' method='post' >
                        <input type='text' name='srfid' autofocus>
                         <button type='submit' onClick='myFunction()'>Done with this class</button>
                         </form>
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
