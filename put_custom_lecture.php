<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="http://localhost/lectures/index.php">To the main page</a><br>
        <b>PUT NEW LECTURE TO THE SHEDULE</b><br>
        <form method="POST" action="room_select2.php">
            SELECT LESSON
            <select name="lesson">
                <?php
                include 'connection.php';
                $query="select MAX(lesson_id) from LESSON";
                $result=  mysql_query($query);//number of lessons in the list
                                              //a bit of shitcode i think
                                              //think i need to make search feathure
                                              //i did it before, so its possible
                $max=  mysql_result($result, 0);
                $query="select lesson_name from LESSON";
                $result=  mysql_query($query);//getting... oh shit, i really
                                              //must to explain this?
                
                mysql_fetch_row($result);//skips the first row (ZERO-row), shitcode
                
                for($i=0; $i<$max; $i++){//making list of lessons
                    $lesson=mysql_fetch_row($result);
                    echo '<option value="'.($i+1).'">'.$lesson[0].'</option>';
                }
                
                ?>
            </select><br>
            SELECT DAY
            <input type="date" name="lecture_day"><br>
            SELECT TIME
            <input type="time" name="time">
            <input value="FIND ROOM" type="submit">
        </form>
        <a href="http://localhost/lectures/put_lecture.php">Standart time</a>
        <?php
        // put your code here
        ?>
    </body>
</html>
