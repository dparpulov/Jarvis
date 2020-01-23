<?php
$connect = mysqli_connect("127.0.0.1", "homestead", "secret", "Jarvis");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM base_test_center WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>