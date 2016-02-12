<?php

include "connection.php";

$to_del=$_POST["to_del"];

$query="delete from LECTURE where lecture_id='".$to_del."'";
mysql_query($query);

header('Location:http://localhost/lectures/shedule.php');
exit;