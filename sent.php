<?php 
session_start();
if(!isset($_SESSION['name'])){
    echo"Access Denied";
}
else{

mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("leave");

$per_page = 5;

// Counts every ID in the Table- users
$pages_query = mysql_query("SELECT COUNT('id') FROM users");
// 0 Means what num do we want to give the first row
$pages = ceil(mysql_result($pages_query, 0) / $per_page);

// if statement
$page = (isset($_GET['page']))  ? (int)$_GET['page'] : 1;

$start = ($page -1) * $per_page;
$query = mysql_query("SELECT * FROM request LIMIT $start, $per_page");
 



echo "<h3> Click on ID to take action on Request </h3> <hr>";
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


    
    $prev = $page -1;
    $next = $page + 1;

    echo "<center>";
    if($page != 1){
    echo ("<a href='sent.php?page=$prev'>Prev</a>");
    };
    //if pages is >= 1, do the following
    if($pages >= 1){

        for($x=1;$x<=$pages;$x++){
            echo ($x==$page) ?'<b><a href="?page='.$x.'">'.$x.'</a></b>  ' :'<a href="?page='.$x.'">'.$x.'</a>  ' ;
        }
    }
    if($page !=$pages){
    echo ("<a href='sent.php?page=$next'>Next</a>");
    }
    echo " <br><hr><a href='index_admin.php'> Click Here to Go Home </a></center>";
mysql_close();
}
?>

