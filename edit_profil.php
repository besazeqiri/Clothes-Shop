<?php
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
    <title>Edit Profil</title>
</head>
<style>
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
</div>
                                    <?php   
                                                         $errors=[];
                                                         $client = new Client();
                                                      
                                                                                                         
                                                         if (isset($_SESSION['id'])){
                                                            $id = $_SESSION['id'];
                                                            $client = $client->get_by_id($id);
                                                        }
                                                       
                                                        if (isset($_POST['change'])){
                                                            
                                                            $client->setFirstname($_POST['firstname']);
                                                            $client->setLastname($_POST['lastname']);
                                                            $client->setDate($_POST['date']);
                                                            $client->setPhone($_POST['phone']);
                                                            $client->setEmail($_POST['email']);
                                                            $client->setPassword($_POST['password']);
                                                            $client->setAccount_number($_POST['account_number']);
                                                               
                                                            
                                                            if(isset($_POST['firstname']) && !empty($_POST['firstname']) && 
                                                            isset($_POST['lastname']) && !empty($_POST['lastname']) && 
                                                            isset($_POST['date']) && !empty($_POST['date']) && 
                                                            isset($_POST['phone']) && !empty($_POST['phone']) && 
                                                            isset($_POST['email']) && !empty($_POST['email'])&& 
                                                            isset($_POST['password']) && 
                                                            isset($_POST['account_number'])){   
                                                            
                                                            if ($client->update($id)){
                                                                    echo '<script> location.replace("view_product.php"); </script>';
                                                                } else {
                                                                    echo 'Failed!';
                                                                }
                                                           
                                                            }
                                                            else{
                                                                $errors [] ="All fields are required";
                                    
                                                            }
                                                            }
                                    ?>
                  
                                         
<form id=""  method="post" action="">
                <?php
                            if(count($errors)){
                                foreach ($errors as $error){
                                echo  "<p class='alert alert-danger w-100'>$error</p>";
                                }
                            }
                        ?>
                        <div class="text-left  w-50 m-auto ">
                            <p class="h3 font-weight-bold text-uppercase">Edit Profil</p>
                          
                        <div class="form-group col-sm-12 mb-3 mt-4">
                            <label>Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname'];?>">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                        <label>Lastname</label>
                          <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname'];?>">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                        <label>Date of birth</label>
                          <input type="date" class="form-control" id="date" name="date" value="">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                        <label>Phone</label>
                          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['phone'];?>">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                        <label>Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION ['email']?>">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                        <label>New  Password</label>
                          <input type="password" class="form-control" id="password" name="password" value="<?php echo $_SESSION['password']?>">
                        </div>

                        <div class="form-group col-sm-12 mb-3 ">
                        <label>Account Number</label>
                          <input type="text" class="form-control" id="account_number" name="account_number" value="<?php echo $_SESSION['account_number']?>">
                        </div>

                        <div class="form-group col-sm-12 mx-auto mb-3 ">
                            <input type="submit" name="change" class="btn btn-primary btn-block py-2 font-weight-bold" value="Change">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>