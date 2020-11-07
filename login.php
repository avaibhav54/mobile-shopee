<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shopee");
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
} 


if(isset($_POST['submit'])){


$email=$_POST[ 'email'];
                       
$_SESSION['name']=$email;

$pass=$_POST['pass'];


$query="select * from user where email='$email' && pass='$pass'";

$run=mysqli_query($conn,$query);

$total=mysqli_num_rows($run);

if ($total==1){
    header('Location:index_.php');
    while($row=$run->fetch_assoc())
    {
        $_SESSION['uid']=$row['user_id'];
    }
}
else{
    echo "Account not found register now";
}
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="logins.css">
    <title>Login Form</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
      function recaptcha () {​​​​​
        var loginbtn = document.querySelector("#login_btn");
        loginbtn.removeAttribute('disabled');
        loginbtn.style.cursor = 'pointer';
      }​​​​​
  </script>
    <script>
     function validate(){
           var email = document.getElementById("email").value;
           var passw = document.getElementById("pass").value;
           var r =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           
           

           if(email=="" ||passw=="")
           {
               alert("All fields are required");
               return false;
           }

            if(email.match(r))
            {
                return true;
            }
            else{
                alert("Email entered is invalid")
                return false;
            }
    
    
           
        }


    </script>

</head>

<body>

    <div class="d-flex justify-content-center align-items-center login-container">
        <form class="login-form text-center" action="" method="post" onsubmit="return validate()">
            <h1 class="mb-5 font-weight-light text-uppercase">Login</h1>
            <div class="form-group">
                <input type="email" class="form-control rounded-pill form-control-lg" name="email" id="email" placeholder="Email Id">
            </div>
         
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" name="pass" id="pass" placeholder="Password">
            </div>
            <div class="forgot-link form-group d-flex justify-content-between align-items-center">
      
                <a href="#">Forgot Password?</a>
            </div>
            <center>
            <div class="g-recaptcha" data-sitekey="6LevqN8ZAAAAACYpnmFSjFGta9PVBUmcW4lAKN7U" data-callback="recaptcha"></div></center>
            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" id="login_btn" name="submit">Log in</button>
            <p class="mt-3 font-weight-normal">Don't have an account? <a href="signup.php"><strong>Register Now</strong></a></p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>




