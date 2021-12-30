<?php
use  ClothesShop\Lib\Order;
use  ClothesShop\Lib\Product;
use  ClothesShop\Lib\Client;


include 'auto_loader.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View Order</title>
</head>
<style>
    .shopping_cart{
        margin-left: 100px;
    }

    .user{
        margin-left:38px;
    }
.single-product{
    border: 1px solid #ccc;
    box-shadow: 0 0 10 px #ccc;
}
.single-product:hover{
    transform: scale(1.1);
    box-shadow: 0 0 2px #222;
    transition: 1s;
}
.single-product small i {
    color: #f1c40f;
}
.single-product h3{
    color:#e74c3c;
}
</style>

<body>
        <div class="container-fluid">
            <div class="row">

              <div class="col-sm-9">
                <header class="header">
                    <nav class="navbar navbar-expand-lg navbar-light  ">
                        <div class="container">
                            <a href="#" class="navbar-brand">
                                <img src="images/1.jpg" alt="logo" width="180">
                            </a>
                        </div>
                    </nav>
                </header>
              </div>
              
              <div class="col-sm-1 ">
                  <section class="shopping_cart">
                <button type="button" class="btn btn-primary ml-2 mt-3">
                  <i class="fa fa-shopping-cart"></i> 
                </button></section>
              </div>

              <div class="col-sm-2 mt-3">
                  <section class="user">
                <div class="btn-group" role="group">
                    <button  id="dopdown-1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-user"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dopdown-1">
                        <a class="dropdown-item" href="view_order.php">View order</a>
                        <a class="dropdown-item" href="edit_profil.php">Edit Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div> 
              </section>       
          </div>
</div>
</div>
   
        </div>
        </div>


        <section class="product text-center ">
            <div class="container">
            <a href="view_product.php" class="btn btn-primary float-right">Back to Product</a>
            <hr class=" my-2">

                <div class="row justify-content-md-center">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-header bg-secondary text-left">
                                    My Order
                                </div>
                                <div class="card-body">                        
                                    <table id="example" class="table responsive sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Order - ID</th>
                                                <th>Product - ID</th>
                                                <th>Your - ID</th>
                                                <th>OrderDate</th>
                                                <th></th>

                                             </tr>
                                        </thead>
                                        <tbody>

            <?php  
                         $order = new Order();

                                if (isset($_SESSION['id'])){
                                    $id = $_SESSION['id'];

                                    $order = $order->order_clientid($id);
                                } 
                                      
                                        
                          if ($order){
                            foreach($order as $oo){
                                echo "<tr>";
                                echo "<td> " . $oo->getId() . "</td>";
                                echo "<td> " . $oo->getProductId() . "</td>";
                                echo "<td> " . $oo->getClientId() . "</td>";
                                echo "<td> " . $oo->getOrder_date() . "</td>";

                                echo "<td> <a href='del-order.php?id=".$oo->getId()."'class ='btn btn-danger'><i class ='fa fa-trash-alt'></i> Delete </a></td>";
                               
                                echo " </tr>";
                            }
                          }
                        ?>                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                                                </div> 
                                                </div> 

            
                
        </section>           
        <hr class=" my-2">

  <?php include 'inc/footer.php';?>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
