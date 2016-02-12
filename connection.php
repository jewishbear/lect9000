<?php

$host="localhost";//connection to db
$user="root";     //make in separate file pls
$pswd="yh57a6yo"; //PLS!!!
                
$db=mysql_connect($host, $user, $pswd);
if(!$db){ echo 'SERVER CONNECTION FAILED';}
$db=mysql_select_db("LECTURES",$db);
if(!$db){ echo 'DB CONNECTION FAILED';}//this belongs to connetion too

