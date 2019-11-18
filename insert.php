<?php 
session_start();

if($_POST){

$name = @$_POST['name'];
$username = @$_POST['username'];
$email = @$_POST['email'];
$password = @md5($_POST['password']);
$cpassword = @md5($_POST['cpassword']);
$usertype = @$_POST['usertype'];


if(($name && $username && $email && $password && $cpassword)){
    if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
    if(strlen($password) > 3 ){
    if($password == $cpassword){
             mysql_connect("localhost","root","") or die("Failed to Connect");

             mysql_select_db("leave");

    $dbnames = mysql_query("SELECT name FROM users WHERE name='$name'");
    $count = mysql_num_rows($dbnames);

    $dbemails = mysql_query("SELECT email FROM users WHERE email='$email'");
    $countemail = mysql_num_rows($dbemails);

    $dbusernames = mysql_query("SELECT email FROM users WHERE username='$username'");
    $countusername = mysql_num_rows($dbusernames);

        if($count > 0){

            echo("Name already exists, <br> Please enter another Name");
            header("location: register.php");
        }else if($countusername > 0){
            echo ("Username Name already Exist! <br> Please enter another Name");
            header("location: register.php");
        }
    else if($countemail > 0){
            echo("Email already exists, <br> Please enter another Email");
            header("location: register.php");

        } else{
                if($usertype == 'User'){
                mysql_query("INSERT INTO users(name,username,email,password)
                VALUES('$name','$username','$email','$password')");

                echo("You have successfully Registered");
                echo("<a href='home.php'> Login Now</a>");
                }else{
                    mysql_query("INSERT INTO admin(name,username,email,password)
                VALUES('$name','$username','$email','$password')");

                echo("You have successfully Registereed");
                echo("<a href='home.php'> Login Now</a>");
                
                }
            }
    }else{
        echo("Sorry Your Passwords don't Match");
    }
    } else{
        echo("Your password is too short
        <br> You need a password between length 4 - 15 
        characters");
    }
}else{
    echo("Invalid Email Address");
}

}else{
    echo ("You have to complete the form");
}
}
else{
    echo "Access Denied";
    exit;
}
?>