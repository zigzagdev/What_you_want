<?php include ('../config/constants.php');?>

<html>
 <head>
   <title>Login - UberEats</title>
    <link rel="stylesheet" href="../css/order.css">
 </head>
<body>
 <div class="login">
   <h1 class="text-center">Login</h1>
    <br/><br/>
   <?php
    if(isset($_SESSION['login']))
     {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
     }
   if(isset($_SESSION['no-login-message']))
     {
      echo $_SESSION['no-login-message'];
      unset($_SESSION['no-login-message']);
     }
   ?>

    <br/><br/>
    <form action="" method="post" class="text-center">
     Username:<br/>
     <input type="text" name="username" placeholder="enter your username"><br/><br/>
     Password:<br/>
     <input type="password" name="password" placeholder="enter your password"><br/>
      <br/>
     <input type="submit" name="submit" value="login" class="btn-primary">
        <br/><br/>
    </form>
    <p class="text-center">Created by - <a href="www.matthew.com" >Matthew</a></p>
  </div>
 </body>
</html>

<?php
 if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $rec = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($rec);

    if($count==1)
    {
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;      //特定のユーザーがログアウトしてるかしてないかの確認の為に置いてる
        header('location:'.SITEURL.'/order');
    }
    else
    {
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        header('location:'.SITEURL.'order/login.php');
    }
}
?>
