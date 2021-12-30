<?php
use  ClothesShop\Lib\Order;
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
                                <?php
                                    $order = new Order();
                                     if (isset($_GET['id'])){
                                        $order = $order->get_by_id($_GET['id']);
                                    }
                                    
                                    if (isset($_POST['delete_order'])){
                                        $id = $_GET['id'];

                                        if ($order->delete($id)){
                                            echo '<script> location.replace("view_order.php"); </script>';
                                        } else{
                                            echo 'Deshtoi!!!';
                                        }
                                    }
                                    ?>
                                <div class="card-body">

                                    <form class="row" method="post" action="">

                                        <div class="col-md-4">
                                            <label for="id" class="form-label">Order ID</label>
                                            <input type="text" name="id" class="form-control" value="<?php echo $order->getId(); ?>">
                                       </div>

                                       <div class="col-md-4">
                                            <label for="productid" class="form-label">Product ID</label>
                                            <input type="text" name="productid" class="form-control" value="<?php echo $order->getProductId(); ?>">
                                       </div>

                                       <div class="col-md-4">
                                            <label for="clientid" class="form-label">Your ID</label>
                                            <input type="text" name="clientid" class="form-control" value="<?php echo $order->getClientId(); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="order_date" class="form-label">Order date</label>
                                            <input type="text" name="order_date" class="form-control" value="<?php echo $order->getOrder_date(); ?>" id="order_date">
                                        </div>
                                                                           
                                        <div class="mb-2 p-4">
                                            <input class="btn btn-danger" id="delete_order" value="Delete order" type="submit" name="delete_order">     
                                        </div>

                                     </form> 
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
