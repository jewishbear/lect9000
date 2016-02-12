<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WELCOME TO THE SHEDULE MAKER 9000</title>
    </head>
    <body>
        <a href="http://localhost/lectures/adding.php">Create new lesson, room</a>
        <br>
        <a href="http://localhost/lectures/put_lecture.php">Put the lecture to shedule</a>
        <br>
        
        <?php
        //yyyy-mm-ddThh:mmZ - time format
        //add lessons - done
        //add rooms - done
        //add lecture - tbd
        ?>
        CHOOSE DATE
        <form method="POST" action="shedule.php">
            <input type="date" name="date">
            <input type="submit" value="VIEW SHEDULE">
        </form>
    </body>
</html>
