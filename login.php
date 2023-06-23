<?php

$host = "localhost";
$user = "root";
$password="";
$db="user";

session_start();

$data = mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("connection failed");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from login where username='".$username."' AND password='".$password."'  ";

    $result = mysqli_query($data,$sql);
    $row = mysqli_fetch_array($result);

    if($row["username"]=="customer1"){
        $_SESSION["username"]=$username;
        header("location:userpage1.php");
    }
    else if($row["username"]=="customer2"){
        $_SESSION["username"]=$username;
        header("location:userpage2.php");
    }

    else if($row["usertype"]=="admin"){
        $_SESSION["username"]=$username;
        header("location:adminpage.php");
    }
    else{
        echo "username or password incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>Login Form</h1>
        <br><br><br><br>
        <div style="background-color:#D7CDE6; width:500px; height:200px; ">
            <br><br>

            <form action="#" method="POST">
                <div>
                    <label for="username">ID</label>
                    <input type="text" name="username" required>
                </div>
                <br><br>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <br><br>
                <div>
                    <input type="submit" value="login">
                </div>
            </form>
        </div>
        <br><br><br><br>
    </center>
</body>

</html>