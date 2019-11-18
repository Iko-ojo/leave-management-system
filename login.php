<?php 
session_start();

if($_POST){
$_SESSION['name'] = @$_POST['username'];
$_SESSION['password'] = @md5($_POST['password']);
$usertype = @$_POST['usertype'];

if(($_SESSION['name']) && ($_SESSION['password'])){

    mysql_connect("localhost","root","") or die("Failed to Connect");

    mysql_select_db("leave");
    
    if($usertype == 'User'){
    $query = mysql_query("SELECT * FROM users where username='".$_SESSION['name']."'");
    $numrows = mysql_num_rows($query);

    if($numrows != 0){
        while($row = mysql_fetch_assoc($query)){
            $dbid = $row['id'];
            $dbfullname = $row['name'];
            $dbemail = $row['email'];
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
        }

        if($_SESSION['name'] == $dbusername ){
            if($_SESSION['password'] == $dbpassword){
               
                header("location: index.php");

            }else{
                echo("Incorrect Password");
            }
        }else{
            echo("Incorrect Name");
        }
    }
    else{
        echo ("This name is not registered!");
    }
}else if($usertype=='Admin'){
    $query = mysql_query("SELECT * FROM admin where username='".$_SESSION['name']."'");
    $numrows = mysql_num_rows($query);

    if($numrows != 0){
        while($row = mysql_fetch_assoc($query)){
            $dbid = $row['id'];
            $dbfullname = $row['name'];
            $dbemail = $row['email'];
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
        }

        if($_SESSION['name'] == $dbusername ){
            if($_SESSION['password'] == $dbpassword){
               
               header("location: index_admin.php");
            }else{
                echo("Incorrect Password");
            }
        }else{
            echo("Incorrect Name");
        }
    }
    else{
        echo ("This name is not registered!");
    }


}

}else{
    echo("Please your full login details");
}
}else{
    echo "Access denied";
    exit;
}
?>