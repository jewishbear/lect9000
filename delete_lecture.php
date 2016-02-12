<?php
include "connection.php";
$temp=$_POST["delete"];
echo 'DO YOU REALLY WANT TO DELETE LECTURE';
$query="select LECTURE.lecture_time, ROOM.room_name, LESSON.lesson_name, LECTURE.lecture_id 
        from LECTURE 
        left join LESSON on LECTURE.lesson_id=LESSON.lesson_id 
        left join ROOM on LECTURE.room_id=ROOM.room_id
        where LECTURE.lecture_id='".$temp."'";
        
$result=  mysql_query($query);
$to_del=  mysql_fetch_row($result, 0);
$hour=$to_del[0]/60;
$minute=$to_del[0]%60;
if($minute==0||$minute/10<1){
    $minute='0'.$minute;
}
echo ' '.(int)$hour.':'.$minute.'  '.$to_del[2].' '.$to_del[1].' ?';
echo '<form method="POST" action="delete.php">'
        . '<input type="text" name="to_del" hidden value="'.$temp.'">'
        . '<input type="submit" value="DELETE">'.' '.'<a href="http://localhost/lectures/shedule.php">BACK</a>'
   . '</form>';