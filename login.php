<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to RJ Tasty Treats</title>
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <div class="header">
                <img src="rj_logo.png" alt="Realflix logo" title="Logo" width=200 draggable="false">
                <h3>Sign In</h3>
                <span>to continue to RJ Tasty Treats</span>
            </div>

            <form action="rj.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitForm" value="SUBMIT">
            </form>

            <a href="index.php" class="signUpMessage">Need an account? Sign up here!  👈</a>
        </div>
    </div>
</body>
</html>