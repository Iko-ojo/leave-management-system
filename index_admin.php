<?php 
session_start();
if(!isset($_SESSION['name'])){
    echo("Access Denied");
    exit;
}else{
    echo "<center>";
    echo'
    <html>
    <head>
        <title>
        </title>
        <link rel="stylesheet" href="mystyle.css">
        <style>
a:link, a:visited {
  background-color: #0099e6;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: #00334d;
}
</style>
    </head>
    <body><center>
        <div class="file_container">
            <h1> Welcome To The Leave Management System </h1>
            <br><hr>
            <p>
                This sites primary allows user to apply for leave and reponse with be sent later by the admin!<br><br>
                <a href="sent.php">All Sent Requests</a> &nbsp;
                <a href="approved.php"> Approved Requests </a> &nbsp;
                <a href="rejected.php"> Rejected Requests </a> &nbsp;
                <a href="pending.php"> Pending Action </a> &nbsp;

        <div class="container" style="background-color:#f1f1f1">
        <br><a href="logout.php">Logout</a
        </div>
    </form>
        </div>
    </center>
    </body>
</html> ';
    echo "<br><hr>";
    echo "</center>";
}
?>

