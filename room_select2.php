<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $date=$_POST["lecture_day"]; //getting date of lecture
        $time=$_POST["time"]; //time of lecture (start time)
        $lesson=$_POST["lesson"];
        
        if(!$time){
            echo 'WRONG TIME<br>';//to prevent wrong datetime in db
            header('Location: http://localhost/lectures/put_custom_lecture.php');
            exit;
        }
        
        //$temp4=  explode("T", $temp3); how to split strings
        //echo $temp4[0].'<br>'.$temp4[1];
        
        $temp=explode(":",$time);//making a custom time
        $time=$temp[0]*60+$temp[1];
        
        ?>
        <a href="http://localhost/lectures/index.php">To the main page</a>
        <form method="POST" action="add_lecture.php">
            <b>SELECT ROOM</b><br>
            <select name="room">
        
        <?php
        include "connection.php";
        
        
        
        $a_query="select lesson_length from LESSON where lesson_id='".$lesson."'";
        $a_res=mysql_result(mysql_query($a_query),0);//length of lesson
        $end_time=$time+$a_res;//which time lesson ends
        
        //lest put here a bit of shitcode
        //time during the day is in minutes
        //i mean current time is HOUR*60+MINUTES
        //so 12:30 is 12*60+30=750
        
        //you dont want to know what is this
        $pre_query="create view FAKE as
                    select ROOM.room_id, ROOM.room_name from ROOM 
                    left join LECTURE on ROOM.room_id=LECTURE.room_id
                    left join LESSON on LECTURE.lesson_id=LESSON.LESSON_id
                    where (
                        LECTURE.lecture_date='".$date."' and (
                            LECTURE.lecture_time+LESSON.lesson_length>='".$time."' and 
                            LECTURE.lecture_time<='".$end_time."'    
                        )
                    ) or ROOM.room_id='0'
                    ";
        mysql_query($pre_query);
        
        $sel_query="select count(ROOM.room_id) from ROOM
                    left join FAKE on ROOM.room_id=FAKE.room_id
                    where FAKE.room_id is null";
        
        $howmuch=mysql_result(mysql_query($sel_query),0);
        
        $query  =  "select ROOM.room_id, ROOM.room_name from ROOM
                    left join FAKE on ROOM.room_id=FAKE.room_id
                    where FAKE.room_id is null";
        
        $result_r=mysql_query($query);
        
        for($i=0; $i<$howmuch; $i++){//putting values to the list
            $rooms=mysql_fetch_row($result_r);
            echo '<option value="'.$rooms[0].'">'.$rooms[1].'</option>';
        }
        
        $drop_query="drop view FAKE";
        mysql_query($drop_query);
        
        /* //save it for children
        create view FAKE as
        select ROOM.room_id, ROOM.room_name from ROOM 
        left join LECTURE on ROOM.room_id=LECTURE.room_id
        left join LESSON on LECTURE.lesson_id=LESSON.LESSON_id
        where (
            LECTURE.lecture_date='2014-04-02' and (
                LECTURE.lecture_time+LESSON.lesson_length>='1080' and 
                LECTURE.lecture_time<='1175'    
            )
        ) or ROOM.room_id='0'
        //and then
        select ROOM.room_id, ROOM.room_name from ROOM
        left join FAKE on ROOM.room_id=FAKE.room_id
        where FAKE.room_id is null
        //and then
        drop view FAKE
        */
        
        ?>
            </select>
            <?php
            //shitcode
            //else next page cant take values from $_POST of previous page
            echo '<input hidden type="text" name="date2" value="'.$date.'">';
            echo '<input hidden type="text" name="time2" value="'.$time.'">';
            echo '<input hidden type="text" name="lesson2" value="'.$lesson.'">';
            ?>
            <input value="ADD LECTURE" type="submit">
        </form>
        <a href="http://localhost/lectures/put_custom_lecture.php">BACK</a>
    </body>
</html>
