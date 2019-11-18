<?php

$id = $_POST['id'];
$actions = $_POST['action'];

mysql_connect("localhost","root","") or die("Failled to connect");

mysql_select_db("leave");

mysql_query("UPDATE request SET state='$actions' WHERE id='$id'");

echo("Updated Successfully");

mysql_close();
echo "<a href='sent.php'> Click Here to for other requests </a>"

?>