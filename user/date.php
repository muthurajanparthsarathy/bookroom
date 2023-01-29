<?php
$a = 0;
include('../includes/dbconnection.php');



function getMinutesBetweenDatesAndTime($date1, $time1, $date2, $time2)
{
    // Combine the input date and time into a single string
    $d1 = $date1;
    $d2 = $date2;


    $date1 = $date1 . " " . $time1;
    $date2 = $date2 . " " . $time2;
    // Create DateTime objects from the input strings
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $time1 = new DateTime($time1);
    $time2 = new DateTime($time2);
    date_default_timezone_set('Asia/Kolkata');
    // Calculate the difference between the two DateTime objects
    
    $date = new \DateTime();
    $tim2= date_format($date, 'H:i:s');
    $tim2 = new DateTime($tim2);
    if ($time1 <= $tim2 && $tim2 <= $time2) {
        $interval = $datetime1->diff($datetime2);
        // Extract the minutes from the interval
        $minutes = $interval->days * 24 * 60;
        $minutes += $interval->h * 60;
        $minutes += $interval->i;
        return $minutes;
    }
    else
    {
        return 0;
    }

}


// Example usage:

echo "<br>";
echo "<br>";
$count = 0;
$cnt = 0;
$nc="MCA";
$ret=mysqli_query($con,"SELECT * FROM allregisteredRoom WHERE department='$nc'");
while ($row=mysqli_fetch_array($ret)) {
    $cd=date("Y-m-d");
    $dt1 = new DateTime($cd);
    $dt2 = new DateTime($row["bookingTo"]);
    $dt3 = new DateTime($row["bookingFrom"]);

   if($dt3<$dt2 && $dt1<=$dt2)
   {

     $date1 = $cd;
    $time1 = $row["TimingStart"];
    
     $date2 = $cd;
    $time2=$row["TimingEnd"];
    $a=getMinutesBetweenDatesAndTime($date1, $time1, $date2, $time2);
        echo $a;
     
   }



$cnt=$cnt+1;
}




    ?>