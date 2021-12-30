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
    <title>Single Product</title>
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

.newarrival{
    background:green;
    width:50px;
    color:white;
    font-size:12px;
    font-weight:bold;
}

.col-md-7 h2{
    color:#555;
}

.price{
    color:#FE980F;
    font-size:26px;
    font-weight:bold;
    padding-top:20px;
}
input{
    border:1px solid #ccc;
    font-weight:bold;
    height:33px;
    text-align:center;
    width:30px;
}
.cart{
    background: #fe980f;
    color:#ffffff;
    font-size:15px;
    margin-left:20px;
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
                </button>
            </section>
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

        <section id="product" class="text-center ">
            <div class="container">
               <div class="row">
                
                    <div class="col-sm-9">
                        <h2 class="font-italic text-muted"> Product</h2>
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
                
                <div class="row ">

                <div class="col-md-5">
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="images/29.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="images/30.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="images/37.jpg" alt="Third slide">
                            </div>
                        </div>                       
                      </div>
                   </div> 

                 <?php  
                 $product = new Product();
                                if (isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $product = $product->get_by_id($id);}                         
                            
                          if ($product){
                                echo" <div class='col-md-7'>";
                                echo" <p class ='newarrival text-center'>New</p>";
                                echo"<h2>".$product->getName_Product()."</h2>";
                                echo"<p>Product Code:OPC2021</p>";
                                echo" <small>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>                                
                                         </small>";
                                echo"<p class='price'>$".$product->getPrice()."</p>";
                                echo"<p><b>Avaliability:</b>In Stock</p>";
                                echo"<p><b>Color: </b>".$product->getColor()."</p>";
                                echo"<p><b>Size: </b>".$product->getSize()."</p>";
                                echo"<label>Quantity: </label>";
                                echo"<input type ='text' value='" .$product->getQuantity()."'readonly>";
                                echo"<a href='pay_order.php?id=".$product->getId()."' class='btn btn-default cart'> Order Now</a>";
                                echo"</div> ";
                          }
                        ?>
                </div>
        </section>
            
           
        <hr class=" my-3">
        <?php include 'inc/footer.php';?>      
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
