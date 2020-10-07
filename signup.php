
<?php
$conn = mysqli_connect("localhost", "root", "", "shopee");
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
} 


if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $name= $_POST['name'];
    $pass= $_POST['pass'];
    $confpass= $_POST['confpass'];
   

    $query="INSERT INTO `user`( `email`,`name`, `pass`, `confpass`) VALUES ('$email','$name','$pass','$confpass')";
    $run=mysqli_query($conn,$query);
  


    if ($run==True) {

        header('Location:login.php');
    }
    else{
        echo "Data insertion failed";
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
    <title>sign up Form</title>

    <script>
        function validate(){
           var email = document.getElementById("email").value;
           var passw = document.getElementById("pass").value;
           var confp = document.getElementById("confpass").value;
           var r =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
           
           

           if(email=="" ||passw=="" ||confp=="")
           {
               alert("All fields are required");
               return false;
           }


            if(passw!=confp){
                alert("Passwords must be same");
                return false;
            }

            if(email.match(r))
            {
                true;
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
        <form class="login-form text-center" action="" method="POST" onsubmit="return validate()">
            <h1 class="mb-5 font-weight-light text-uppercase">Sign Up</h1>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control rounded-pill form-control-lg" id="email" name="email" placeholder="Email Id">
            </div>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" name="phone" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" id="pass" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" id="confpass" name="confpass" placeholder="Confirm Password">
            </div>
        

            <button type="submit" name="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" >Sign Up</button>
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
























































































































































