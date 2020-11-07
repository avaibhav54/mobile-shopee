<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Checkout Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="payment.css">
<style>
 #bod{
   background-color:transparent;
 }
 #com{
   border:2px solid black;
   box-shadow: 5px 10px #888888;
 } 
  #pay{
    width: 20em;
   height: 3em;
   background: #2196F3;
   color: #f8f8f8;
  border-radius: 5px;
  cursor: pointer;
  margin-left:6px;
  margin-top:5px;
}
</style>
<script>
     function validate(){
           var name = document.getElementById("name").value;
           var numb = document.getElementById("num").value;
           var exp = document.getElementById("exp").value;
           var cvv = document.getElementById("cvv").value;
           

           if(name=="" ||numb=="" || exp=="" || cvv=="")
           {
            alert("All fields are required");
               return false;
           }

        }


    </script>
</head>
<body id="bod">
	


<div class="wrapper" >
  <div class="payment" id="com">
    
    
    <h2>Payment Details</h2>
    <div class="form">
      <form action="" method="POST" onsubmit="return validate()">
        <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" class="input" name="cardnum" id="num" data-mask="0000 0000 0000 0000" placeholder="Card Number of 16 digit">
        <i class="far fa-credit-card"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Card holder name:</label>
        <input type="text" class="input" id="name" placeholder="Name on card">
        <i class="fas fa-user"></i>
      </div>
      
      <div class="card-grp space">
        <div class="card-item icon-relative">
          <label class="label">Expiry date:</label>
          <input type="text" name="expiry-data" class="input" id="exp" data-mask="00 / 00"  placeholder="MM / YY">
          <i class="far fa-calendar-alt"></i>
        </div>
        <div class="card-item icon-relative">
          <label class="label">CVC:</label>
          <input type="text" class="input" data-mask="000" id="cvv" placeholder="CVV">
          <i class="fas fa-lock"></i>
        </div>
      </div>
    </div>
    <input type="submit" id="pay" value="Pay" name="submit"/>
  
  </div>
  </form>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>
</html>

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shopee");
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
} 


if(isset($_POST['submit'])){
  
    $cardnum= $_POST['cardnum'];
  
    $query="INSERT INTO `payment`( `cardnum`) VALUES ('$cardnum')";
    $run=mysqli_query($conn,$query);
  


    if ($run==True) {

        header('Location:success.php');
    }
    else{
        echo "Payment failed";
    }
}
$us=$_SESSION['uid'];
$sql = "SELECT * from `cart` where `user_id`='$us'";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($res)) {
  $x=$row['cart_id'];
  $y=$row['user_id'];
  $z=$row['item_id'];
  $query2="DELETE FROM `cart` WHERE `user_id`='$us'";
  $run2= mysqli_query($conn,$query2);
  $query1="INSERT INTO `order` VALUES ('$x','$y','$z')";
  $run1=mysqli_query($conn,$query1);


}
?>