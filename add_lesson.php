<?php

include 'connection.php';

if($_POST["lesson_name"]){//bad decision, but this is all i have now
    try {
        $lesson_name=$_POST["lesson_name"];
        
    }catch (Exception $e){
                //nothing
    }
    if($_POST["lesson_length"]){
        try{
            $lesson_length=$_POST["lesson_length"];
            $idx= mysql_result(mysql_query("select MAX(lesson_id) from LESSON"),0);
            $idx+=1;//incrementing index, mb better use autoincrement?
                    //sadly i dont know how to
            if($lesson_length==90){
                $lesson_length+=5;
            }
            mysql_query("insert into LESSON values ('".$idx."','".$lesson_name."','".$lesson_length."')");                
                
        }catch(Exception $e){
            echo'adding failed'.$e;
        }
    }
}

header('Location: http://localhost/lectures/adding.php');
exit;

