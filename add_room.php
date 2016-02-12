<?php

include 'connection.php';

if($_POST["room_name"]){
            $room_name=$_POST["room_name"];
            $room_info=$_POST["room_info"];
            $idx= mysql_result(mysql_query("select MAX(room_id) from ROOM"),0);
            $idx+=1;
            mysql_query("insert into ROOM values ('".$idx."','".$room_name."','".$room_info."')");
}

header('Location: http://localhost/lectures/adding.php');
exit;


