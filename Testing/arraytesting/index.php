<?php
session_start();
$current_query = $_SERVER['QUERY_STRING'];
if(!isset($_SESSION['id'])) {
  $_SESSION['id'] = [9,2,6];
}
  //$_SESSION['id'] = [9,2,6];
//var_dump($_SESSION['id']);
$newbun  = end($_SESSION['id']) + $i;
var_dump($_SESSION['id']);
array_shift($_SESSION['id']);
array_push($_SESSION['id'], $newbun);
var_dump($_SESSION['id']);
$query = "id=33&name=spencer&new=true";
$search = substr($query,"id");
var_dump($search);

 ?>
