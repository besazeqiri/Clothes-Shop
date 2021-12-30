<?php
use  ClothesShop\Lib\Product;
include 'auto_loader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View Product</title>
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


        <section id="product" class="product text-center ">
            <div class="container">
               <div class="row">
                
                    <div class="col-9">
                        <h2 class="font-italic text-muted ">All Product</h2>
                    </div>
                      <div class="col-3">
                        
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

            
                <div class="row ">
                    
                    <div class="col-md-2">
                        <div class="menu">
                            <ul class="list-group border-bottom ">
                                <li class="list-group-item"><span class="font-italic text-muted">Categories</span></li>
                                <li class="list-group-item"><a href="#">T-shirt</a></li>
                                <li class="list-group-item"><a href="#">Sweater</a></li>
                                <li class="list-group-item"><a href="#">Dress</a></li>
                                <li class="list-group-item"><a href="#">Scarf</a></li>
                              </ul>
                        </div>
                    </div>

                    
                        <?php
                        $product = new Product();

                        foreach ($product ->get_all() as $p){

                          echo "<div class='col-md-2'>
                          <div class='single-product p-2'>";
                          echo "<a href='single_product.php?id=".$p->getId()."'><img src='images/".$p->getId().".jpg' alt='' class='img-fluid' width='300'></a>";
                          echo"<h4>".$p->getName_Product()."</h4>";
                          echo" <small>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>                                
                            </small>";
                            echo"<h3>".$p->getPrice()."</h3>";
                            echo "<button class='btn btn-danger'>DETAILS</button>";
                            echo '</div>
                          </div>';
                          }
                            ?>
                        </div>
        </section>
            
           
        <hr class=" my-2">

  <?php include 'inc/footer.php';?>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
