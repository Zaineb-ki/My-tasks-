<?php 
require 'db_conn.php';

if (isset($_GET['id'])) {
   $ID = $_GET['id'];
   $stmt  = $conn->prepare('UPDATE  todos SET checked= "1" WHERE id = '.$ID);
   $stmt->execute();
   header("Location: todo.php");
}
?>