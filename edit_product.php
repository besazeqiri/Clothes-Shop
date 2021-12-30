<?php
use  ClothesShop\Lib\Product;
include 'auto_loader.php';
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Edit Product </title>
</head>
<body>

    <header class="navbar navbar-dark sticky-top bg-dark shadow">
        <a class="navbar-brand col-md-3 col-lg-2 px-3" href="#">Clothes Shop</a>
        <a href="logout.php" class=" btn btn-danger btn-sm pl-2 mr-2">Log out</a>   
  </header>

 
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark">
                <div class="position-sticky pt-5">
                    <ul class="nav flex-column">
                    <li class="nav-item  mb-2">
                             <h5> Admin Panel</h5>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="admin.php">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="add_product.php">
                                <i class="fas fa-cart-plus"></i>
                                Add Products
                            </a>
                        </li>
                     
                        <li class="nav-item mb-2">
                            <a class="nav-link  text-white" href="clients.php">
                                <i class="fas fa-users"></i>
                                Users
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white" href="add_client.php">
                                <i class="fas fa-user"></i>
                                Add User
                            </a>
                        </li>

                        <li class="nav-item  mb-2">
                            <a class="nav-link text-white" href="orders.php">
                                <i class="fas fa-gift"></i>
                                  Orders
                            </a>
                        </li>
                           
                        </ul>
                    <div class="border-top border-light p-3 mt-5">  
                    <a href="#" class=" btn btn-primary btn-sm pl-2 mr-2">Settings</a>
                    <a href="#" class=" btn btn-primary btn-sm pl-2 mr-2 my-1">Activity Log</a> 
                </div>
            </div>
        </nav>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Product</h1>

                </div>
                <div class="container">
                    <div class="row justify-content-md-center">
               <?php

                        $errors=[];
                        $product = new Product();
                        if (isset($_GET['id'])){
                            $id = $_GET['id'];
                            $product = $product->get_by_id($id);}

                        if (isset($_POST['edit_product'])){
                            
                            $product->setName_product($_POST['name_product']);
                            $product->setColor($_POST['color']);
                            $product->setSize($_POST['size']);
                            $product->setPrice($_POST['price']);
                            $product->setQuantity($_POST['quantity']);
                            $product->setImage_url($_POST['image_url']);

                        if(isset($_POST['name_product']) && !empty($_POST['name_product']) && 
                        isset($_POST['color']) && !empty($_POST['color']) && 
                        isset($_POST['size']) && !empty($_POST['size']) && 
                        isset($_POST['price']) && !empty($_POST['price']) && 
                        isset($_POST['quantity']) && !empty($_POST['quantity'])){

                            if ($product->update($id)){
                                echo '<script> location.replace("admin.php"); </script>';
                            } else {
                                echo 'Failed!';
                            }
                        }
                        else{
                            $errors [] ="All fields are required";

                        }
                        }
                        ?>
                                                                           
                        <div class="col-md-auto">
                            <div class="card">
                            <?php
                            if(count($errors)){
                                foreach ($errors as $error){
                                echo  "<p class='alert alert-danger w-100'>$error</p>";
                                }
                            }
                        ?>
                                <div class="card-header bg-secondary text-white">
                                    Edit Product
                                </div>
                    <div class="card-body">
                        <form class="row" method="post" action="">
        
                        <div class="col-md-4">
                            <label for="name_product" class="form-label">Name of Product</label>
                            <input type="text" name="name_product" class="form-control" value="<?php echo $product->getName_product(); ?>" id="name">
                        </div>

                        <div class="col-md-4">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" name="color" class="form-control" value="<?php echo $product->getColor(); ?>" id="color">
                        </div>

                        <div class="col-md-4">
                            <label for="size" class="form-label">Size</label>
                            <input type="text" name="size" class="form-control" value="<?php echo $product->getSize(); ?>" id="size">
                        </div>

                        <div class="col-md-4">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $product->getPrice(); ?>" id="price">
                        </div>

                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" name="quantity" class="form-control" value="<?php echo $product->getQuantity(); ?>" id="quantity">
                        </div>
                                    
                        <div class="col-md-4">
                             <label for="image">Image</label>
                             <input type="file" name= "image_url" class="form-control-file" id="image">
                        </div>
                                    
                        <div class="mb-2 p-2">
                            <input type="submit" name="edit_product" class="btn btn-primary" id="edit_product" value="Edit Product">
                        </div>
                                 </form>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
               
            <hr class=" my-0">
            <footer class="">
               <p class=" text-center text-muted my-4">Copyright <i class="fa fa-copyright"></i> Your Website 2021</p>
             </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    
</body>
</html>