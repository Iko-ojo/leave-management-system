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
                <a href="apply.php">Apply for Leave</a> &nbsp;
                <a href="userview.php"> View Sent Request </a> 

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
        </div>
    </form>
        </div>
    </center>
    </body>
</html> ';
    echo "<br><hr>";
    echo "<a href='logout.php'>Logout</a>";
    echo "</center>";
}
?>

