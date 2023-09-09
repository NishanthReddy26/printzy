<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #c850c0, #4158d0);
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    h2 {
      text-align: center;
      color: #fff;
      margin-bottom: 30px;
    }

    form {
      max-width: 400px;
      width: 100%;
      background-color: #fff;
      padding: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    .login-link {
      text-align: center;
      margin-top: 16px;
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <h2>Registration</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required value=""> <br>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required value=""> <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required value=""> <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required value=""> <br>
    <label for="confirmpassword">Confirm Password:</label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
    <button type="submit" name="submit">Register</button>
  </form>
  <a class="login-link" href="login.php">Login</a>
</body>

</html>
