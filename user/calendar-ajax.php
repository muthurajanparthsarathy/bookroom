<?php
// require class
require_once 'class.calendar.php';
$phpCalendar = new PHPCalendar ();
// object of class
$calendarHTML = $phpCalendar->getCalendarHTML();
echo $calendarHTML;
?>