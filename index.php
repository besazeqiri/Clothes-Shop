<?php
use  ClothesShop\Lib\Client;
include 'auto_loader.php';
?>

<?php

session_start();
$errors=[];

if(isset ($_POST['register'])){

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
            echo '<script> location.replace("login.php"); </script>';
        }else {
            echo 'Failed!';
        }
    }
   else{
    $errors [] ="All fields are required";
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Index</title>
</head>
<body>

    <div class="container-fluid">
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <img src="images/1.jpg" alt="logo" width="150">
                    </a>
                </div>
            </nav>
        </header>

        <div class="container-fluid">
            <div class="row py-8 mt-1 align-items-center">
                <div class="col-md-5 pr-lg-5 mb-5">
                    <img src="images/1.jpg" alt="Foto1" class="img-fluid mb-3" width="700">
                    <h5 class="mt-3">Welcome to our clothes shop</h5>
                    <p class="font-italic text-muted mt-3">Create a Account/Login to see our product.</p>
                </div>
         

                <div class="col-md-7 col-lg-6 ml-auto ">
                    <form id="register-form" method="post" action="">
                        <div class="text-left w-100 mb-4 ml-3">
                            <p class="h3 font-weight-bold">Register!</p>
                                </div>

                                <?php
                            if(count($errors)){
                                foreach ($errors as $error){
                                echo  "<p class='alert alert-danger w-100 ml-2'>$error</p>";
                                }
                            }
                        ?>

                                <div class="container">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="firstname" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                
                              
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                            <input type="date" class="form-control" name="date" placeholder="Date of birth">
                                      </div>
                                      <div class="form-group col-md-6">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                                      </div>
                                  </div>
                      </div>

                                   <div class="form-group col-lg-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email address">
                                    </div>
                                   <div class="form-group col-lg-12 mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                   </div>
                              
                                <div class="form-group col-lg-12 mx-auto mb-0">
                                    <input type="submit" name="register" class="btn btn-primary btn-block py-2 font-weight-bold" value="Create your account">
                                </div>
                                <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                                    <div class="border-bottom w-100 ml-5"></div>
                                    <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                                    <div class="border-bottom w-100 mr-5"></div>
                                </div>
                                <div class="text-center w-100">
                                    <p class="text-muted font-weight-bold">Already Registered? <a href="login.php" id="login" class="text-primary ml-2">Login</a></p>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>
                    </div>
                <hr class=" my-1">

<?php include 'inc/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>
