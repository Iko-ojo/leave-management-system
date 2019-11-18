
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
<body><center>
    <div class="file_container">
<form method="post" action="insert.php" style="border:1px solid #ccc">
  <div class="container">
  <a href = "home.php">Home</a> 
    <h2>Sign Up</h2>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="name" required>

    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
            <label>        <select name="usertype" class="custom-select">
                   <option type="radio"> User </option>
                   <option type="radio" > Admin </option>
                    </select>
</label><br><hr>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="cpassword" required>

    <div class="clearfix">
     <button type="submit">Register </button><br>
     <button type="reset" class="cancelbtn"> Reset </button>
    </div>
  </div>
</form>
</div></center>
</body>
</html>