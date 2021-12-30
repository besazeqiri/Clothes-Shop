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
    <title>Single Product</title>
</head>
<style>
    .shopping_cart{
        margin-left: 100px;
    }

    .user{
        margin-left:38px;
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


        <section id="product" class="product text-center ">
            <div class="container">
               <div class="row">
                
                    <div class="col-sm-9">
                        <h2 class="font-italic text-muted "> Confirm Payment</h2>
                    </div>
                      <div class="col-sm-3">
                        
                      <div class="input-group">
                            <div class="form-inline">
                              <input type="text" id="form1" placeholder="Search" class="form-control ml-3" />
                            </div>
                          
                            <button type="button" class="btn btn-primary">
                              <i class="fa fa-search"></i>
                            </button>
                          </div>
                    </div>
                      
               </div>  
        
           <hr class=" my-2">
    
             <?php    
    
                 $product = new Product();
                 $client = new Client();


              if(isset($_SESSION['id'])){
                                $id = $_SESSION['id'];
                                $client = $client->get_by_id($id); 
                         }
                          
                         
                    if (isset($_GET['id'])){
                            $id = $_GET['id'];
                            $product = $product->get_by_id($id); 
                        } 

                             
                            if(isset($_POST['pay_product'])){ 
                                $order = new Order();
                            
                                $order->setClientId($_SESSION['id']);
                                $order->setProductId($_GET['id']);


                                if(isset($_SESSION['id']) && !empty($_SESSION['id']) &&  
                                  isset($_GET['id']) && !empty($_GET['id']))
                                  {
                                if ($order->create()){  
                                            echo '<script> location.replace("view_order.php"); </script>';
                                    } 
                                    else {
                                         echo 'Failed!'; 
                                     }
                                  }
                                }
                ?>

                <h4 class="font-italic text-muted text-left"> About Product</h4>
                <br>
                <form class="row" method="post" action="">

                <div class="col-md-4">
                                    <label for="id" class="form-label">Id of Product</label>
                                    <input type="text" name="id" class="form-control" id="id" value="<?php echo $product->getId();?>" readonly>
                            </div>
                            <div class="col-md-4">
                                    <label for="name_product" class="form-label">Name of Product</label>
                                    <input type="text" name="name_product" class="form-control" id="name_product" value="<?php echo $product->getName_product();?>" readonly>
                            </div>
                            <div class="col-md-4">
                                    <label for="color" class="form-label">Color</label>
                                    <input type="text" name="color" class="form-control" id="color" value="<?php echo $product->getColor();?>" readonly>
                            </div>
                            <div class="col-md-4">
                                    <label for="size" class="form-label">Size</label>
                                    <input type="text" name="size" class="form-control" id="size" value="<?php echo $product->getSize();?>" readonly>
                            </div>
                          
                            <div class="col-md-4">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" id="price" value="<?php echo $product->getPrice();?>" readonly>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <label for="id" class="form-label">Your ID</label>
                                <input type="text" name="id" class="form-control mr-2"  id="id" value="<?php echo $_SESSION['id'];?>" readonly>
                        </div>
                            <div class="col-md-4">
                                
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input type="text" name="firstname" class="form-control"  id="firstname" value="<?php echo $_SESSION['firstname'];?>" readonly>
                            </div>
                            
                            <div class="col-md-4">
                                
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" name="lastname" class="form-control"  id="lastname" value="<?php echo $_SESSION['lastname'];?>" readonly>
                            </div>
                            
                            <div class="col-md-4">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" name="account_number" class="form-control"  id="account_number" value="<?php echo $_SESSION['account_number'];?>"readonly>
                            </div>

                            <div class="ml-2 p-2">
                                <br>
                                   <input type="submit" name="pay_product" class="btn btn-primary" id="pay_product" value="Pay Product">
                             </div>
                            
                            </form>   
        </section>
            
           
        <hr class=" my-3">
        <?php include 'inc/footer.php';?>      
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>