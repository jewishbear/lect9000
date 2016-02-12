<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "connection.php";
        
        $date=$_POST["date"];
        if(!$date){
            header('Location:http://localhost/lectures/index.php');
            exit;
        }
        $pre_query="select count(LESSON.lesson_name) from LECTURE 
                left join LESSON on LECTURE.lesson_id=LESSON.lesson_id 
                left join ROOM on LECTURE.room_id=ROOM.room_id
                where LECTURE.lecture_id!=0 and LECTURE.lecture_date='".$date."'";
        $howmuch=  mysql_result(mysql_query($pre_query), 0);
        $query="select LECTURE.lecture_time, ROOM.room_name, LESSON.lesson_name, LECTURE.lecture_id 
                from LECTURE 
                left join LESSON on LECTURE.lesson_id=LESSON.lesson_id 
                left join ROOM on LECTURE.room_id=ROOM.room_id
                where LECTURE.lecture_id!=0 and LECTURE.lecture_date='".$date."'";
        
        $result=  mysql_query($query);
        echo 'DATE: '.$date.'<br>';
        ?>
        <form method="POST" action="delete_lecture.php">
            <table border="1px">
            
            <?php
            for($i=0; $i<$howmuch; $i++){
                $temp[$i]=  mysql_fetch_row($result);
            }
            sort($temp);
            for($i=0; $i<$howmuch; $i++){
                echo '<tr>';
                //$temp[$i]=  mysql_fetch_row($result);
                echo '<td>'.($i+1).'</td><td>'.$temp[$i][2].'</td><td>'.$temp[$i][1].'</td>';
                $hour=$temp[$i][0]/60;
                $minute=$temp[$i][0]%60;
                if($minute==0||$minute/10<1){
                    $minute='0'.$minute;
                }
                echo '<td>'.(int)$hour.':'.$minute.'</td>';
                echo '<td><input type="submit" name="delete" value="'.$temp[$i][3].'"></td>';
                echo '</tr>';
            }
            
            ?>
                
            
            </table><br>
        </form>
        <a href="http://localhost/lectures/index.php">BACK</a>
        <?php
        
        /*
          select LESSON.lesson_name, ROOM.room_name, LECTURE.lecture_time from LECTURE 
          left join LESSON on LECTURE.lesson_id=LESSON.lesson_id 
          left join ROOM on LECTURE.room_id=ROOM.room_id
          where LECTURE.lecture_id!=0 and LECTURE.lecture_date='2014-04-01'
        */
        
        ?>
        
    </body>
</html>
