<?php
include_once "mysqlConnect.php";
$sql = "SELECT * FROM news";
if($result = $news->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
   /*
    $kol - количество записей для вывода
    $art - с какой записи выводить
    $total - всего записей
    $page - текущая страница
    $str_pag - количество страниц для пагинации
    */

    // Пагинация
    // Текущая страница
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $kol = 5;  // количество записей для вывода
    $art = ($page * $kol) - $kol;
   

    // Определяем все количество записей в таблице
    $res = mysqli_query($news,"SELECT COUNT(*) FROM news");
    $row = mysqli_fetch_row($res);
    $total = $row[0]; // всего записей
    // Количество страниц для пагинации
    $str_pag = ceil($total / $kol);
    // Запрос и вывод записей
    $result = mysqli_query($news,"SELECT * FROM news LIMIT $art,$kol");
    $myrow = mysqli_fetch_array($result);
    do{
        echo "<u><a class =date>". date('d.m.y', $myrow['idate']) ."</a>". " " ."<a href=page.php?page=".$myrow['id'] .">". $myrow['title']. "</a></u>";
        echo "<p>".$myrow['announce']."</p>";
        
    } while ($myrow = mysqli_fetch_array($result));}
    echo "<hr size=1px width=99% color=grey>";
    //Пагинация
    echo "<h3 class =no_margin>"."Страницы: "."</h3>" . "</br>";
    for ($i = 1; $i <= $str_pag; $i++){
       if ($i == $page){
           echo "<a href=index.php?page=".$i. "method=post><input type=submit class =color_btn value=".$i."></form> ";
       } else echo "<a href=index.php?page=".$i. "method=post><input type=submit value=".$i."></form> ";
}  
?>
