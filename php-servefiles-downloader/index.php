<?php


if ($handle = opendir('files/cctv/1')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<a href='download.php?file=".$entry."'>".$entry."</a>\n";
        }
    }
    closedir($handle);
}