<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "9948334127k";
    $database = "rj_tasty_treats";
    $check_email = "";
    $check_password = "";
    $isValidUser = false;
    $name = "";
    $email = "";
    $uname = "";
    $phn = "";
    $regTime = "";

    try{
        $connect = mysqli_connect($serverName, $userName, $password, $database);
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["email"];
            $pass = $_POST["password"];

            $qry = "SELECT email,passcode FROM users WHERE email='$email' and passcode='$pass'";
            $qry2 = "SELECT * FROM users WHERE email='$email' and passcode='$pass'";

            $res = mysqli_query($connect,$qry);
            $res2 = mysqli_query($connect,$qry2);
            

            while ($row = mysqli_fetch_assoc($res)) {
                $check_email = $row['email'];
                $check_password = $row['passcode'];
            }

            while ($row = mysqli_fetch_assoc($res2)) {
                $name = $row['firstName'] . " " . $row['lastName'];
                $uname = $row['userName'];
                $email = $row['email'];
                $phn = $row['phoneNo'];
                $regTime = $row['registered_time'];
            }

            if($email == $check_email && $pass == $check_password){
               $isValidUser = true;
            }

            // if($isValidUser){
            //     echo "User is : valid <br>";
            // }
            // else{
            //     echo "User is : Invalid <br>";
            // }
            // echo 'searched'; 
        }

        // echo "connected";
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

        h3{
            display:flex;
            align-items: center;
            justify-content: center;
            margin-top: 200px;
        }

        p{
            display:flex;
            flex-direction:column;
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

        ul li{
            list-style:none;
        }

    </style>
</head>
<body>
    <h1>Welcome to RJ Tasty Treats</h1>
    <h3></h3>
    <p class="data"></p>
    <a href="index.php"></a>

    <script>
        var isValid = "<?php echo $isValidUser; ?>";
        var fullName = "<?php echo $name; ?>";
        var userName = "<?php echo $uname; ?>";
        var emailId = "<?php echo $email; ?>";
        var phoneNumber = "<?php echo $phn; ?>";
        var registeredTime = "<?php echo $regTime; ?>";
        if(isValid){
            document.querySelector("h3").innerHTML = "User Details :";
            document.querySelector(".data").innerHTML = valid();

            function valid(){
                return `<span>Full Name : ${fullName}</span>
                <span>User Name : ${userName}</span>
                <span>Email Id : ${emailId}</span>
                <span>Phone Number : ${phoneNumber}</span> 
                <span>Registered Time : ${registeredTime}</span>`;
            }
        }
        else{
            document.querySelector(".data").innerText = inValid();
            document.querySelector("a").innerText = "Need an account? Sign up here!  👈";
            function inValid(){
                return "Invalid user : User Didn't Exists";
            }
        }
    </script>
</body>
</html>