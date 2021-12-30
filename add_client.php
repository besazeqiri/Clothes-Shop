<?php
use  ClothesShop\Lib\Client;
include 'auto_loader.php';
?>

<?php

$errors=[];
if(isset ($_POST['add_client'])){

  $client = new Client();
                            
  $client->setFirstname($_POST['firstname']);
  $client->setLastname($_POST['lastname']);
  $client->setDate($_POST['date']);
  $client->setPhone($_POST['phone']);
  $client->setEmail($_POST['email']);
  $client->setPassword($_POST['password']);



  if(isset($_POST['firstname']) && !empty($_POST['firstname']) && 
     isset($_POST['lastname']) && !empty($_POST['lastname']) && 
     isset($_POST['date']) && !empty($_POST['date']) && 
     isset($_POST['phone']) && !empty($_POST['phone']) && 
     isset($_POST['email']) && !empty($_POST['email']) && 
     isset($_POST['password']) && !empty($_POST['password'])){
         if ($client->create()){
            echo '<script> location.replace("clients.php"); </script>';
        }else {
            echo 'Failed!';
        }
    }else{
        $errors [] ="All fields are required";
    }
  }


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
    <title>Add User </title>

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
                            <a class="nav-link text-white" href="admin.php">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>
                        <li class="nav-item  mb-2">
                            <a class="nav-link text-white " href="add_product.php">
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
                            <a class="nav-link  active" href="add_client.php">
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
                </div>
                </div>
            </nav>



            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add User</h1>

                </div>
                <div class="container">
                    <div class="row justify-content-md-center">
                                                                           
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
                                    Add New User
                                </div>
                 <div class="card-body">
                    <form class="row" method="post" action="">
                            <div class="col-md-4">
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname">
                            </div>

                            <div class="col-md-4">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname">
                            </div>

                             <div class="col-md-4">
                                    <label for="date" class="form-label">Date of birth</label>
                                    <input type="date" name="date" class="form-control" id="date">
                            </div>

                            <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                            </div>

                            <div class="col-md-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="email">
                            </div>
                                    
                            <div class="col-md-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" name="password" class="form-control" id="password">
                            </div>
                                    
                            <div class="mb-2 p-4">
                                    <input type="submit" name="add_client" class="btn btn-primary" id="add_client" value="Add User">
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