<?php 
 mysql_connect("localhost","root","") or die("Failed to Connect");

 mysql_select_db("leave");

$result = mysql_query("SELECT * FROM request WHERE
id='".$_REQUEST['ids']."'");

echo "<h3> Click on ID to take action on Request </h3> <hr>";
echo ("<table width=\"90%\" align= center border=2>");
echo ("<tr><td width=\"10%\" align=center bgcolor=\"FFFF00\" >ID</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Leave Type</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Reason</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Duration</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >State</td>
<td width=\"30%\" align=center bgcolor=\"FFFF00\" >Username</td></tr>
");

while($row = mysql_fetch_assoc($result)){
    $id = $row['id'];
    $type = $row['type'];
    $reason = $row['reason'];
    $duration = $row['duration'];
    $state = $row['state'];
    $username = $row['username'];

    echo ("
    <tr><td align=center>$id</td>
    <td>$type</td><td>$reason</td>
    <td>$duration</td><td>$state</td><td>$username</td></tr>
    ");
} echo("</table");


?>
<html>
<form method="POST" action="action.php">
    <p> Select Action on a Request: 
    <select name="action">
        <option>Accept</option>
        <option>Reject</option>
    </select>
    <input type="hidden" name="id" value="<?php echo $_REQUEST['ids'];?>" >
    <button name="submit" type="submit">OK!</button>
</form>
</html>

