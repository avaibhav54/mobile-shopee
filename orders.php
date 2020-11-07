
<?php
     ob_start();
    // include header.php file
    include ('header.php');
?>



<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Your Orders</h5>

        <!-- ordered items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getDataorder('order') as $item) :
                        $order = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale ">
                                Payment Mode: Card
                            </div>
                            <hr>
                            <div class="d-flex font-rale">
                                Expected Delivery: <?php
                                            $day = date( "d-M-Y", strtotime( "+3 days" ) );
                                            echo $day;
                                          ?>
                            </div>


                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            Rs<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['item_price'];
                        }, $order); // closing array_map function
                    endforeach;
                ?>
            </div>


   <?php
  
    /*  include top sale section */
        include ('Template/_top-sale.php');
    /*  include top sale section */

?>


<?php
// include footer.php file
include ('footer.php');
?>