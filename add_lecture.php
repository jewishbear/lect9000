<?php

include "connection.php";

$time=$_POST["time2"];
$date=$_POST["date2"];
$room=$_POST["room"];
$lesson=$_POST["lesson2"];

$query="select MAX(lecture_id) from LECTURE";
$idx=mysql_result(mysql_query($query),0);
$idx+=1;

$insert_query="insert into LECTURE values ('".$idx."','".$lesson."','".$room."',"
        . "'".$date."','".$time."')";


/*echo $time.'<br>';
echo $date.'<br>';
echo $room.'<br>';
echo $lesson.'<br>';
echo $idx.'<br>';*/
if(!$date){
    echo 'WRONG DATE<br><a href="http://localhost/lectures/put_lecture.php">BACK</a>';
}
mysql_query($insert_query);

header('Location: http://localhost/lectures/put_lecture.php');
exit;