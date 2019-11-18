<html>
    <head>
        <title>
        </title>
        <link rel="stylesheet" href="mystyle.css">
    </head>
    <body><center>
        <div class="file_container">
            <h1> Welcome To The Leave Management System </h1>
            <br><hr>
        <form action="login.php" method="post">
            <div class="container">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username or Email" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <label>
                    <select name="usertype" class="custom-select">
                   <option type="radio" > User </option>
                   <option type="radio" > Admin </option>
                    </select>
                </label>

                <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
             <span class="psw"> <a href="register.php">Create an Account</a></span>
        </div>
    </form>
        </div>
    </center>
    </body>
</html>