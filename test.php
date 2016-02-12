<?php

include 'connection.php'; 
$date[0]='2014-04-01';
$time[0]=650;
$pre_query="select count(ROOM.room_id) from ROOM " // dont ask me how it works
                . "left join LECTURE on LECTURE.room_id=ROOM.room_id where "
                . "(LECTURE.lecture_date is NULL and "
                . "( LECTURE.lecture_time is NULL or LECTURE.lecture_time<'".$time[0]."' ) ) "
                . "or ( LECTURE.lecture_date='".$date[0]."' and "
                . "( LECTURE.lecture_time is NULL or LECTURE.lecture_time<'".$time[0]."' ) )";
        
        $howmuch=mysql_result(mysql_query($pre_query),0);
        
        echo $howmuch;