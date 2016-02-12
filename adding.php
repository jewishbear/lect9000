<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="http://localhost/lectures/index.php">To the main page</a>
        <br>
        <b>ADD NEW LESSON</b><br>
        <form method="POST" action="add_lesson.php">
            Lesson name:<br>
            <input type="text" name="lesson_name"><br>
            Lesson length in minutes(normal lesson is 90):<br>
            <input type="number" name="lesson_length" placeholder="MINUTES"><br>
            <input value="ADD LESSON" type="submit"><br>
        </form>
        
        <b>ADD NEW ROOM</b><br>
        <form method="POST" action="add_room.php">
            Room name:<br>
            <input type="text" name="room_name"><br>
            Room info:<br>
            <textarea name="room_info"></textarea><br>
            <input value="ADD ROOM" type="submit"><br>
        </form>
        
        <?php
        // put your code here
        ?>
    </body>
</html>
