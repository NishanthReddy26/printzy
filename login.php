<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
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

    .registration-link {
      display: inline-block;
      background-color: #555;
      color: #fff;
      padding: 10px 16px;
      border-radius: 4px;
      text-decoration: none;
      margin-top: 16px;
    }

    .registration-link:hover {
      background-color: #444;
    }
  </style>
</head>

<body>
  <h2>Login</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="usernameemail">Username or Email:</label>
    <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required value=""> <br>
    <button type="submit" name="submit">Login</button>
  </form>
  <a class="registration-link" href="registration.php">Registration</a>
</body>

</html>
