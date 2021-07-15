<?php
    // $serverName = "localhost";
    // $userName = "root";
    // $password = "9948334127k";
    // $database = "rj_tasty_treats";

    // $serverName = "remotemysql.com";
    // $userName = "PsWjvlAUyX";
    // $password = "VgWdVM8ry8";
    // $database = "PsWjvlAUyX";


    $serverName = "sql11.freesqldatabase.com";
    $userName = "sql11425415";
    $password = "QknRHGKkb9";
    $database = "sql11425415";

    
    $check_email = "";
    $check_phoneNo = "";
    $userExists = false;

    try{
        $connect = mysqli_connect($serverName, $userName, $password, $database);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fname = $_POST["firstName"];
            $lname = $_POST["lastName"];
            $uname = $_POST["userName"];
            $email = $_POST["email"];
            $phoneNo = $_POST["phoneNo"];
            $pass = $_POST["password"];

            $qry1 = "SELECT email,phoneNo FROM users WHERE email='$email' and phoneNo='$phoneNo'";

            $res1 = mysqli_query($connect,$qry1);

            while ($row = mysqli_fetch_assoc($res1)) {
                $check_email = $row['email'];
                $check_phoneNo = $row['phoneNo'];
            }

            if($email == $check_email || $phoneNo == $check_phoneNo){
               $userExists = true;
            }
            else{
                $qry2 = "INSERT INTO users (firstName, lastName, userName, email, phoneNo, passcode) VALUES ('$fname', '$lname', '$uname', '$email', '$phoneNo', '$pass')";
                $res2 = mysqli_query($connect,$qry2);
            }
        }

        // echo "connected to freesqldb";
    }
    catch(Exception $e){
        die("Not Connected : " . mysqli_connect_error());
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: rgb(122, 108, 108);;
        }
        h1{
            text-align: center;
            color: black;
        }

        p{
            display:flex;
            align-items: center;
            justify-content: center;
            margin:auto;
            border-radius:5px;
            padding:40px;
            position: absolute;
            top: 50%;
            left: 50%;
            /* margin-right: -80%; */
            transform: translate(-50%, -50%);
            border: 1px solid black;
        }

        a{
            display:flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 90%;
            left: 50%;
            /* margin-right: -80%; */
            text-decoration:none;
            color:black;
            transform: translate(-50%, -50%);
        }

    </style>
</head>
<body>
    <h1></h1>
    <p></p>

    <a href="login.php" class="login"></a>
    <a href="index.php" class="register"></a>

    <script>
        var userExists = "<?php echo $userExists; ?>";
        if(!userExists){
            document.querySelector("h1").innerText = "Successfully Registered to RJ Tasty Treats";
            document.querySelector("p").innerText = "Sign In Now🤩, Order your Delicious recipes😋";
            document.querySelector(".login").innerText = "Sign In to RJ Tasty Treats here!  👈";
        }
        else{
            document.querySelector("h1").innerText = "Oops! Email/Phone Number alreay Exists";
            document.querySelector("p").innerText = "Retry to Sign Up Now🤩, Order your Delicious recipes😋";
            document.querySelector(".register").innerText = "Sign Up to RJ Tasty Treats here!  👈";
        }
    </script>
</body>
</html>
