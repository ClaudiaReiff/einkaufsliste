<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Navigation bar -->
    <?php include('navigation.php'); ?>

    <div style="display: flex">
        <div style="margin-right: 10px">
            <h4>SIGN UP</h4>
            <p>Sign up here!</p>
            <form action="inc/signup.inc.php" method="post">
                <label for="email">E-mail:</label><br>
                <input type="text" name="email" id="email" placeholder="E-mail"><br><br>
                <label for="pwd">Password:</label><br>
                <input type="password" name="pwd" id="pwd" placeholder="Password"><br><br>
                <label for="pwdRepeat">Repeat Password:</label><br>
                <input type="password" name="pwdRepeat" id="pwdRepeat" placeholder="Repeat password"><br><br>
                <button type="submit">SIGN UP</button>
            </form>
        </div>
        <div>
            <h4>LOGIN</h4>
            <p>Login here!</p>
            <form action="inc/login.inc.php" method="post">
                <label for="email">E-mail:</label><br>
                <input type="text" name="email" id="email" placeholder="E-mail"><br><br>
                <label for="pwd">Password:</label><br>
                <input type="password" name="pwd" id="pwd" placeholder="Password"><br><br>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>