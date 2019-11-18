<?php 
session_start();
if(!isset($_SESSION['name'])){
    echo"Access Denied";
}
else{
mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("leave");

$query = mysql_query("SELECT * FROM request where username='".$_SESSION['name']."'");
$count = mysql_num_rows($query);

if($count < 1){
    echo "<center><h3> You have no made any Request</h3></center>";
}
else{ 
echo ("<center><h3>Sent Request </h3> <br><table width=\"90%\" align= center border=2>");
echo ("<tr><td width=\"40%\" align=center bgcolor=\"FFFF00\" >Leave Type</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Reason</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Duration</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >State</td></tr>
");

while($row=mysql_fetch_assoc($query)){
    $type = $row['type'];
    $reason = $row['reason'];
    $duration = $row['duration'];
    $state = $row['state'];

    echo ("
    <tr><td align=center>$type</td>
    <td>$reason</td><td>$duration</td><td>$state</td></tr>
    ");
} echo("</table>");
echo ("<br><hr><a href='index.php'>Click Here to go back to the Home Page</a></center>");
    echo "</center>";
mysql_close();
}
}
?>