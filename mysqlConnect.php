<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$BDname = "news";
 
$news = new mysqli($servername, $username, $password, $BDname);
 
if ($news -> connect_error) {
    printf("Соединение не удалось: %s\n", $news -> connect_error);
    exit();
};