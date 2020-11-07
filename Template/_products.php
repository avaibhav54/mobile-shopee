<!--   product  -->
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if (isset($_POST['product-submit'])){
                    // call method addToCart
                    $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
                }
            }

?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                    <form action="addr.php">
                    <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button></form>
                    </div>
                    <div class="col">

                    <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['uid'] ?? '1';; ?>">
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "shopee");
                            if($conn->connect_error){
                                die("Connection Failed : ". $conn->connect_error);
                            } 
                            if(isset($_SESSION['uid'])){
                            $us=$_SESSION['uid'];
                            }
                            else{
                                $us=-1;

                            }
                            $i=$item['item_id'];
                            $query="SELECT * FROM `cart` WHERE `user_id`='$us' AND `item_id`='$i'";
                            $run=mysqli_query($conn,$query);
                            if (mysqli_num_rows($run)){
                                echo '<button type="submit" disabled class="btn btn-success form-control">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="product-submit" class="btn btn-warning  form-control ">Add to Cart</button>';
                            }
                            ?>
            </form>
        
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">Rs<span><?php echo $item['item_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">Rs 152.00</span></td>
                    </tr>
                </table>
                <!---    !product price       -->

                <!--    #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">E-Kart<br>Deliverd</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                        </div>
                    </div>
                </div>
                <!--    !policy -->
                <hr>

                <!-- order-details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivery by : Mar 29  - Apr 1</small>
                    <small>Sold by <a href="#">Digital Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                </div>
                <!-- !order-details -->

                
            </div>

            <div class="col-12 py-4">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">->Quad Rear Camera - 16MP (Ultra wide) + 12MP (Dual Aperture - F 1.5/2.4)+ 12MP (Telephoto) + ToF (DepthVision Camera) with Flash | 10MP front camera</p>
                <p class="font-rale font-size-14">->Memory, Storage & SIM: 12GB RAM | 256GB internal memory expandable up to 1TB | Dual SIM dual-standby (4G+4G) - Hybrid Sim slot</p>
                <p class="font-rale font-size-14">->4300mAH lithium-ion battery | Fast charging with 25W charger (included in the box)</p>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
        endif;
        endforeach;
?>