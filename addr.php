
<?php
     ob_start();
    // include header.php file
    include ('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <style>
   #add{
       width: 50%;
   } 
    </style>
       <script>
     function validate(){
           var name = document.getElementById("name").value;
           var numb = document.getElementById("num").value;
           var pin = document.getElementById("pin").value;
           var address = document.getElementById("address").value;
           

           if(name=="" ||numb=="" || pin=="" || address=="")
           {
            alert("All fields are required");
               return false;
           }

        }


    </script>

</head>
<body>
    
</body>
</html>
<div id="add" class="container my-5">
<h2 style="margin-bottom:30px; text-align:center">Delivery Information</h2>
<form action="" method="POST" onsubmit="return validate()">
  <div class="form-group">
    <label for="exampleInputname1">Full Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter Your Name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputnumber1">Mobile Number</label>
    <input type="text" class="form-control" name="num"  id="num" placeholder="10-digit mobile number without prefixes">
    <small id="numHelp" class="form-text text-muted">May be used to assist delivery</small>
  </div>
  <div class="form-group">
    <label for="exampleInputpin1">PIN Code</label>
    <input type="text" class="form-control" name="pin" id="pin" placeholder="6 digits[0-9] PIN Code">
  </div>
  <div class="form-group">
    <label for="exampleInputpin1">Address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Enter your complete address">
  </div>
  <p id="nameval"></p>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "shopee");
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
} 


if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $num= $_POST['num'];
    $pin= $_POST['pin'];
    $address= $_POST['address'];
   

    $query="INSERT INTO `delivery`( `name`,`num`, `pin`, `address`) VALUES ('$name','$num','$pin','$address')";
    $run=mysqli_query($conn,$query);
  


    if ($run==True) {

        header('Location:payment.php');
    }
    else{
        echo "Delivery information insertion failed";
    }
}



?>
<?php
   
    /*  include top sale section */
        include ('Template/_top-sale.php');
    /*  include top sale section */

?>
<?php
// include footer.php file
include ('footer.php');
?>