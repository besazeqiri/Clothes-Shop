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
    <title>Product </title>
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
                        <li class="nav-item  mb-2">
                            <a class="nav-link active" href="#">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item  mb-2">
                            <a class="nav-link  text-white" href="add_product.php">
                                <i class="fas fa-cart-plus"></i>
                                Add Products
                            </a>
                        </li>
                        <li class="nav-item  mb-2">
                            <a class="nav-link  text-white" href="clients.php">
                                <i class="fas fa-users"></i>
                                Users
                            </a>
                        </li>
                        <li class="nav-item  mb-2">
                            <a class="nav-link  text-white" href="add_client.php">
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
                    <div class="border-top border-light p-3  mt-5">  
                    <a href="#" class=" btn btn-primary btn-sm pl-2 mr-2">Settings</a>
                    <a href="#" class=" btn btn-primary btn-sm pl-2 mr-2 my-1">Activity Log</a>
                    <a href="edit_profil.php" class=" btn btn-primary btn-sm pl-2 mr-2 my-1">Edit Profil</a>


                </div>
            </div>
</nav>
        
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">All Products</h1>
                </div>

                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    All Products
                                </div>
                                <div class="card-body">                        
                                    <table id="example" class="table responsive sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name of Product</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                             </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                                    $product = new Product();
                                                    foreach ($product->get_all() as $p){

                                                        echo "<tr>";
                                                        echo "<td> " . $p->getId() . "</td>";
                                                        echo "<td> " . $p->getName_Product() . "</td>";
                                                        echo "<td> " . $p->getColor() . "</td>";
                                                        echo "<td> " . $p->getSize() . "</td>";
                                                        echo "<td> " . $p->getPrice() . "</td>";
                                                        echo "<td> " . $p->getQuantity() . "</td>";
                                                        echo "<td> " . $p->getImage_url() . "</td>";
                                                        echo "<td> <a href='edit_product.php?id=".$p->getId()."' class ='btn btn-primary'><i class ='fa fa-edit'></i> Edit </a></td>";
                                                        echo "<td> <a href='delete_product.php?id=".$p->getId()."' class ='btn btn-danger'><i class ='fa fa-trash-alt'></i> Delete </a></td>";
                                                        echo " </tr>";
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