<?php 
session_start();
if(!isset($_SESSION['name'])){
    echo"Access Denied";
}
else{

mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("leave");

$per_page = 5;

$query = mysql_query("SELECT * FROM request WHERE state='Reject'");
$count = mysql_num_rows($query);

if($count < 1){
    echo "<center><h3> No Pending Request</h3></center>";
}

else{

echo "<h3> Rejected Requests </h3> <hr>";
echo ("<table width=\"90%\" align= center border=2>");
echo ("<tr><td width=\"10%\" align=center bgcolor=\"FFFF00\" >ID</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Leave Type</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Reason</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Duration</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >State</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Username</td></tr>
");

while($row=mysql_fetch_assoc($query)){
    $id = $row['id'];
    $type = $row['type'];
    $reason = $row['reason'];
    $duration = $row['duration'];
    $state = $row['state'];
    $username = $row['username'];

    echo ("
    <tr><td align=center><a href=\"sent1.php?ids=$id&types=$type&reasons=$reason&durations=$duration&states=$state&usernames=$username\">$id</a></td>
    <td>$type</td><td>$reason</td>
    <td>$duration</td><td>$state</td><td>$username</td></tr>
    ");
} echo("</table");


    echo " <br><hr><a href='index_admin.php'> Click Here to Go Home </a></center>";
mysql_close();
}
}
?>

