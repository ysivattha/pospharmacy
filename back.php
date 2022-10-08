<?php
include 'config/db_connect.php';
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
  header('location:index.php');
  exit();
}

$select = "SELECT * FROM invoice Order by transaction_id desc";
  $query_select = $connect->query($select);
  $sel = $query_select->fetch_array();
  $tt = $query_select->num_rows;
  $no = $sel['transaction_id'];
  $no1 = $sel['inv_no'];
  $finalcode = '';

  if($tt > 0 ){
     $finalcode = $no1 + 1;
  }
  else{
     $finalcode = $no + 1;
  }

  if (isset($_GET['b'])) {
     header("location:sale.php?cash=cash&invoice=$finalcode");
  }


?>