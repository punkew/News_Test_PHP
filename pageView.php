<?php
include_once "mysqlConnect.php";

$sql = "SELECT * FROM news";
if($result = $news->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    if (isset($_GET['page'])){
        $page = $_GET['page'];  
    }else {
        $page = 1;
    }
$res = mysqli_query($news,"SELECT (*) FROM news"); 
// Запрос и вывод записей
$result = mysqli_query($news,"SELECT title, content FROM news WHERE id = $page");
$myrow = mysqli_fetch_array($result);
do{
    echo "<h1>".$myrow['title'] . "<hr size=1px width=99% color=grey>" . "</h1>";
    echo "<p>".$myrow['content']."</p>";
} while ($myrow = mysqli_fetch_array($result)); }
echo "<hr size=1px width=99% color=grey>";
echo "<a href=index.php?page=1method=get>". "Все новости >>";
?>