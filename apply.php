
<?php

session_start();
if(!isset($_SESSION['name'])){
    echo("Access Denied");
    exit;
}else{

  mysql_connect("localhost","root","") or die("Failed to Connect");

  mysql_select_db("leave");

  $query = mysql_query("SELECT * FROM users where username='".$_SESSION['name']."'");

  while($row=mysql_fetch_assoc($query)){
    $id = $row['id'];
    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
  }


    echo "<center>";
    echo '
<html>
<head>
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
<body>
    <div class="file_container">
<form method="post" action="insert_application.php" style="border:1px solid #ccc">
  <div class="container">
  <a href = "index.php">Home</a> &nbsp  <a href="logout.php">Logout</a> 
  <center>
    <h2>Leave Application Form</h2>
    <p>Please fill in this form to apply for a leave.</p>
    <hr>
    <input type="hidden" name="id" value="'.$id.'" />
    <input type="hidden" name="username" value="'.$_SESSION['name'].'" />
    <label><b>Fullname: <br></b></label>';
     echo $name;
     

    echo '<br><hr>
    <label><b>Email: <br> </b></label> 
    ';
    echo $email;
  echo '
</label><br><hr>

    <select name="leavetype" required>
            <option type="radio" value="None"> Select Type of Leave </option>
            <option type="radio">Annual Leave </option>
            <option type="radio" > Parental Leave</option>
            <option type="radio"> Personal/ career Leave </option>
        <option type="radio" > Community Service Leave</option>
         <option type="radio"> Long Service Leave </option>
</select><br><br>
    <label><b>Duration (in Weeks)</b></label>
    <input type="text" placeholder="Enter the Leave Duration" name="duration" required>

    
    <label><b>Reason</b></label><br>
    <textarea name="reason" placeholder="Enter the reason for the leave" cols="80" rows="3" required></textarea>

    <input type="hidden" name="state" value="Pending" />
   
    <div class="clearfix">
     <button type="submit">Send </button><br>
     <button type="reset" class="cancelbtn"> Reset </button>
      
    </div>
  </div>
</form>
</div></center>
</body>
</html>
';
    echo "</center>";
}


?>