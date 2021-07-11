<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Siva Prasad | Registration From</title>
</head>

<body>
    <div class="main-container">
        <div class="form-container">
            <div class="header">
                <img src="rj_logo.png" alt="RJ Tasty Treats Logo" title="Logo" draggable=false width=200>
                <h3>Sign Up</h3>
                <p>to continue to RJ Tasty Treats</p>
            </div>

            <form action="connect.php" method="POST">
                <input type="text" name="firstName" placeholder="First Name" required>

                <input type="text" name="lastName" placeholder="Last Name" required>

                <input type="text" name="userName" placeholder="User Name" required>

                <input type="email" name="email" placeholder="Email" required>

                <input type="text" name="phoneNo" placeholder="Phone Number" required>
                
                <input type="password" name="password" placeholder="Password" required>

                <input type="submit" name="submitForm" value="SUBMIT">
            </form>

            <a href="login.php" class="signInMessage">Already have an account? Sign in here! 👈</a>
        </div>
    </div>

</body>

</html>
