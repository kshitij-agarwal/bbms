<!-- This file to connect the program to the database -->

<?php
$db = new PDO('mysql:host=localhost;dbname=mypro_bbms', 'root', '');

if($db)
{
    echo "Connect";
    // echo gettype($db); //To check the datatype of the variable
}
else 
{
    echo "Not Connected";
}
