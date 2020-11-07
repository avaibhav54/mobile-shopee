<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <style>
        #su{
            margin-left:15%;
            margin-right:15%;
            margin-top:15%;
            border: 10px solid transparent;
            padding: 30px;
            border-image: url(border.png) 20 stretch;
         }
         #suc{
            font-size:30px;
            margin-left:25%;
         }
        
    
    </style>
</head>
<body>
   <?php
session_start();
if(isset($_SESSION['total'])){
echo " <div id='su'><div id='suc'>Your order is successful of ".$_SESSION['total']."<br>"."&nbsp;&nbsp;&nbsp;Thanku for shopping with us!!"."</div>
</div>";
}
?> 
<br><br>
<center>
<form action="index_.php">
<button type="submit" name="submit" class="btn btn-warning btn-lg">Continue Shopping</button></form></center>
</body>
</html>

