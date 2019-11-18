<?php 
session_start();

if($_POST){
$type = @$_POST['leavetype'];
$reason = @$_POST['reason'];
$duration = @$_POST['duration'];
$state = @$_POST['state'];
$username = @$_POST['username'];
$userId = @$_POST['id'];
 


        mysql_connect("localhost","root","") or die("Failed to Connect");

        mysql_select_db("leave");
            
        mysql_query("INSERT INTO request(type,reason,duration,state,username,userid)
        VALUES('$type','$reason','$duration','$state', '$username','$userId')");

        echo("<center> <h2> Leave Management System</h2><br> <h5> Sent Request </h5> 
        Your Request has been captured <br> Check on View Sent Requests to see update on your requests <br><hr>");
        echo ("<a href='index.php'>Click Here to go back to the Home Page</a></center>");
        
        mysql_close();
}
else{
    "Access Denied";
}        




?>