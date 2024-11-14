<?php
$mysqli=mysqli_connect('localhost','root','','db_todo_list');
mysqli_select_db($mysqli,'db_todo_list') or die("database tidak ditemukan");
?>