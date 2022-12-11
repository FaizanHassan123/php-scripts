<?php
// Start Time
$start_time = microtime(true);


// Starting a Background Script
pclose(popen("start /B run.bat 3.mp4 3out.mp4", "r"));


// End Time
$end_time = microtime(true);
$execution_time = ($end_time - $start_time);
echo " Execution time of script = ".$execution_time." sec";