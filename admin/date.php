<?php
 $a=0;
function getMinutesBetweenDatesAndTime($date1, $time1, $date2, $time2) {
    // Combine the input date and time into a single string
    $d1 = $date1;
    $d2 = $date2;
    $date1 = $date1 . " " . $time1;
    $date2 = $date2 . " " . $time2;
    // Create DateTime objects from the input strings
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
if($d1===$d2)
{
    $s = strpos($time1, ":");
    $s = $s + 1;
    $min1 = substr($time1, $s, 2);
    $s = strpos($time2, ":");
    $s = $s + 1;
    $min2 = substr($time2, $s, 2);
        echo $min2;
        echo "<br>";
        echo $min1;
      

        if ($min1 > $min2) {
            $GLOBALS['a']=1 ;
        } elseif ($min1 < $min2) {
            $GLOBALS['a']=2;
        } else if($min1 == $min2) {
            $s = strrpos($time1, ":");
            $s = $s + 1;
            $second1 = substr($time1, $s, 2);
            $s = strrpos($time2, ":");
            $s = $s + 1;
            $second2 = substr($time2, $s, 2);
            if ($second1 > $second2) {
                $GLOBALS['a'] = 1;
            } else if ($second1 < $second2) { {
                    $GLOBALS['a'] = 0;
                }

            }
        }
     
   
    // Example usage:
   
   


if($GLOBALS['a']==1)
{

        return 0;
}
else
{
    return 1;
}
}
else {
        // Calculate the difference between the two DateTime objects

        $interval = $datetime1->diff($datetime2);
        // Extract the minutes from the interval
        $minutes = $interval->days * 24 * 60;
        $minutes += $interval->h * 60;
        $minutes += $interval->i;
        return $minutes;
    }   
}

// Example usage:
$date1 = "2022-02-01";
$time1 = "21:02:10";
$date2 = "2022-01-01";
$time2 = "23:03:10";
echo "<br>";
echo getMinutesBetweenDatesAndTime($date1, $time1, $date2, $time2);
echo "<br>";
 // Output: 15
?>