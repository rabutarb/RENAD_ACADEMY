<html>
    <head>

    </head>
    <body>
<?php
date_default_timezone_set("Asia/Qatar");
$systemTime = date("h:i:00");
echo $systemTime;
echo "<br>";
$scheduleTime = Date('04:00:00');
echo $scheduleTime;
$timeDiff = $systemTime - $scheduleTime;
echo "<br>";
echo $timeDiff;
echo "<br>";
echo date('h:i:00',strtotime($systemTime));
echo "<br>";
echo date('h:i:00',strtotime($scheduleTime));
echo "<br>";
$class_duration1 = 20;
$class_duration2 = 40;
$class_duration3 = 50;
#testing adding for schedule time
$scheduleTime = date('H:i:00', strtotime('+'. $class_duration1.'minutes', strtotime($scheduleTime)));
echo $scheduleTime."this is it";
echo "<br>";

#testing adding for system time
$systemTime = date('H:i:00', strtotime('+'. $class_duration1.'minutes', strtotime($systemTime)));
echo $systemTime."this is it";

#testing bigger and smaller times
// if($scheduleTime>$systemTime){
//     echo "<br>";
//     echo "true";
//         echo "<br>";

// }else{
//           echo "<br>";
//     echo "This class is over";
//           echo "<br>";
// }

$system = Date('06:00:00');
#testing the loop of which class we are at 
$durations = array($class_duration1,$class_duration2,$class_duration3);
#total of durations
$n = 0;
#classes to skip
$c = 0;
for ($col = 0; $col < 3; $col++) {
    $n = $n + $durations[$col];
    $sTime = date('H:i:00', strtotime('+'. $n.'minutes', strtotime($scheduleTime)));
    if ($sTime>$systemTime){
        echo $col;
    }
//     if($scheduleTime>$systemTime){
//     echo "<br>";
//     echo "true";
//         echo "<br>";

// }else{
//           echo "<br>";
//     echo "This class is over";
//           echo "<br>";
// }
    echo $c;
    echo "<br>";
  }
  

?>

      </body>
</html>

