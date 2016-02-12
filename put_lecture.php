<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="http://localhost/lectures/index.php">To the main page</a><br>
        <b>PUT NEW LECTURE TO THE SHEDULE</b><br>
        <form method="POST" action="room_select.php">
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
            <select name="time"><br>
                <option value="570">1st 9-30/11-05</option>
                <option value="675">2nd 11-15/12-50 </option>
                <option value="830">3rd 13-50/15-25</option>
                <option value="935">4th 15-35/17-10</option>
                <option value="1030">5th 17-10/18-55</option>
                <option value="1080">1st (NIGHT) 18-00/19-35</option>
                <option value="1180">2nd (NIGHT) 19-40/21-15</option>
            </select><br>
            <input value="FIND ROOM" type="submit">
        </form>
        
        <a href="http://localhost/lectures/put_custom_lecture.php">Custom time</a>
        <?php
        //time during the day is in minutes
        //i mean current time is HOUR*60+MINUTES
        //so 12:30 is 12*60+30=750
        //values in the form above are times of lecture start
        
        //    DAY         TIME+BREAK NIGHT       TIME+BREAK 
        // 1  9-30 /11-05 95+10      18-00/19-30 90+5
        // 2  11-15/12-50 95+60      19-35/21-10 95
        // 3  13-50/15-25 95+10
        // 4  15-35/17-10 95+10
        // 5  17-10/18-55 95
        ?>
        
    </body>
</html>
