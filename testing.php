
<html>
    <head>

    </head>
    <body>
<?php
//$class_duration1 = 15;
//$class_duration2 = 40;
//$class_duration3 = 50;

$class_durations= array(15,40,50);

date_default_timezone_set("Asia/Qatar");
$systemTime = date("h:i:00");
// $systemTime = new DateTime('07:20:00'); 
// echo "System time is: "; 
// echo $systemTime;
// echo "<br>";;

// $scheduleTime = Date('07:00:00');
// echo "Schedule start time is ". $scheduleTime ;
// echo "<br>";

$timeDiff = $systemTime - $scheduleTime;
echo $timeDiff;
echo "<br>";;

echo "Minutes difference is " .  $timeDiff->i . " and hours difference is " . $timeDiff->h ;
echo "<br>";;

foreach ($class_durations as $duration)
{
echo "first duration is " . $duration;
echo "<br>";;
echo "schedule starting time is " . $scheduleTime->format('H:i');
echo "<br>";;
$scheduleTime = $scheduleTime -> add(new DateInterval('PT' . $duration . 'M'));
echo "schedule starting time after adding duration is " . $scheduleTime->format('H:i');
echo "<br>";;

echo "Decision:";
if ($systemTime > $scheduleTime)
{
echo "System time: {$systemTime->format('H:i:00')} is greater that schedule time {$scheduleTime->format('H:i')} ; cross that lecture";
}
else
{
echo "System time: {$systemTime->format('H:i:00')} is less that schedule time {$scheduleTime->format('H:i')} ; I guess it is the current lecture";


}
echo "<br>";;
}




?>


      </body>
</html>
