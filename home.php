
<?php
   session_start();
   include("connection.php");
   include("functions.php");

   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    //something was posted
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    if(!empty($user_name) && !empty($password))
    {
     
      $query="select * from users where user_name='$user_name' limit 1";
      $result=mysqli_query($con,$query);

      if($result)
      {
        if($result && mysqli_num_rows($result)>0)
        {
          $user_data=mysqli_fetch_assoc($result);
          if($user_data['password']===$password)
          {
            $_SESSION['user_id']=$user_data['user_id'];
            header("Location:start.html");
            die;
          }
        }
      }
      echo'<script>
         window.alert("Wrong user-name or password!") </script> ';
    }
    else
    {
      echo '<script> window.alert("Register then login") </script> ';
    }
   }

   


   if($_SERVER['REQUEST_METHOD']=="POST")
   {
    //something was posted
    $user_name=$_POST['uname'];
    $password=$_POST['pswd'];
    if(!empty($user_name) && !empty($password))
    {
      $user_id=random_num(50);
      //save to database
      $query="insert into users(user_id,user_name,password) values ('$user_id','$user_name','$password') ";
      mysqli_query($con,$query);
      header("Location:home.php");
      die;
    }
    else
    {
     echo"Please enter some valid information!";
    }
   }
?>

<html lang="en">
    <head>
        <title>HOME</title>
        <link rel="stylesheet" href=style.css>
    </head>
    <body>
        <div class="main">
          <div class="navbar">
            <div class="icon">
              <h2 class="logo">ENIGMA</h2>
            </div>
            <div class="menu">
              <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><button class="loginbtn" onclick='myfun()'>LOGIN</button>
              </ul>
            </div>
          </div>
            <div class="content" id="div1">
                <!-- <img id="img" src="add.jpg"> -->
              <h1 id="h1">THE DEAD RECKONING</h1>
              <br>
              <br><br>
              <button class="cn" onclick=myfun()>
                START
              </button>
              </div>
          
        <div id='login-form'class='login-page'>
          <div class="form-box">
            <div class="button-box">
            <div id="btn"></div>
            <button type="button"onclick='login()'class='toggle-btn'>Log In</button>
            <button type="button"onclick='register()'class='toggle-btn'>Register</button>

            </div>
          <form  method="post" id="login" class="input-group-login">
            <input type="text"class="input-field" placeholder="Email Id" required name='user_name'>
            <input type="password"class="input-field"placeholder="Enter Password" required name='password'>
            <input type="checkbox"class="check-box"><span>Remember Password</span>
            <button type="submit" class="submit-btn" id="t1" >Login</button>
          </form>
          <form id="register" class="input-group-register" method="post">
           <input type="text" class="input-field" placeholder="First Name" required>
           <input type="text" class="input-field" placeholder="Last Name" required>
           <input type="email" class="input-field" placeholder="Email Id" required name='uname'>
           <input type="password" class="input-field" placeholder="Enter Password" required name='pswd'>
           <input type="password" class="input-field" placeholder="Confirm Password" required>
           <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>
           <button type="submit" class="submit-btn">Register</button>
          </form>

          <script>
            var x=document.getElementById('login');
            var y=document.getElementById('register');
            var z=document.getElementById('btn');
            function register()
            {
             x.style.left='-400px';
             y.style.left='50px';
             z.style.left='110px';
            }
            function login()
            {
             x.style.left='50px';
             y.style.left='450px';
             z.style.left='0px';
            }
          </script>

          <script>
            var modal=document.getElementById('login-form');
            window.onclick=function(event)
            {
             if(event.target==modal)
             {
              modal.style.display='none';
             }
            }
            function myfun(){
              document.getElementById('login-form').style.display='block';
              document.getElementById('div1').style.display='None';
            }
          </script>
          </div>
        </div>   
      </div>   
    </body>
</html>
