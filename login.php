<?php
use  ClothesShop\Lib\Client;
include 'auto_loader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container-fluid">
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light  ">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <img src="images/1.jpg" alt="logo" width="180">
                    </a>
                </div>
            </nav>
        </header>     
         
         <?php
                         $client = new Client();
                         $errors=[];

                     if(isset($_POST["login"]))  {  

                        $email = $_POST['email'];
                        $password = $_POST['password'];

 if(isset($_POST['email']) && !empty($_POST['email']) &&  isset($_POST['password']) && !empty($_POST['password'])){
                            $client->login($email,$password);
                    }else{
                            $errors [] ="All fields are required";
                    }
                }
                        ?>  
    
    <form id="login"  method="post" action="">
                        <div class="text-left w-50 m-auto pt-5">
                            <p class="h3 font-weight-bold text-uppercase">Login Form</p>
                            <?php
                            if(count($errors)){
                                foreach ($errors as $error){
                                echo  "<p class='alert alert-danger w-100 ml-2'>$error</p>";
                                }
                            }
                        ?>
                          
                        <div class="form-group col-sm-12 mb-3 mt-4">
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email address">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                          <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                        </div>

                        <div class="form-check col-sm-12 mb-3 ml-3 ">
                           <input type="checkbox" name="remember" class="form-check-input">
                           <label class="form-check-label text-muted font-weight-bold" for="">Remember me</label>
                        </div>

                        <div class="form-group col-sm-12 mx-auto mb-3 ">
                            <input type="submit" name="login" class="btn btn-primary btn-block py-2 font-weight-bold" value="Log In">
                        </div>

                           <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                                 <span class="px-2 small text-muted font-weight-bold ">OR</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <div class="text-center w-100">
                             <p class="text-muted font-weight-bold">Do not have an account? <a href="index.php" id="register" class="text-primary ml-2">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr class=" my-3">
    <?php include 'inc/footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</body>
</html>