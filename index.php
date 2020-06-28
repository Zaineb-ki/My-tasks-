<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To_Do_List | Login</title>

    <!-- style css -->
    <link rel="stylesheet" href="css\styleLogin.css">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"crossorigin="anonymous">

    <!-- JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

     <!-- Font awesome -->
     <script src="https://kit.fontawesome.com/f84ba90e3b.js" crossorigin="anonymous"></script>

     <!-- Favicon -->
     <link rel="shortcut icon" href="images\5aa78e137603fc558cffbf17.png" type="image/x-icon">
</head>
<body style="background-color: #34495e;">
    <br> <br>
        <div class="container" id="log">
            <div class="row">
                <div class="col-6">
                    
                            <div class="jumbotron">
                                    
                                                <center>
                                                   <h3>login <i class="far fa-user" style="color : #34495e"></i></h3>
                                                   </center>
                                       
                                        
                                         <br>
                                        <?php
                                        if (isset($_GET['error'])){ ?>
                                            <p class="error"> <?php echo $_GET['error'];?></p>
                                        <?php } ?>
                                        
                                   
                                    <br>
                                    <!-- Login -->
                                        <form action="login.php" method="post">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                                <br>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                                            </div>
                                            <center>
                                            <button type="submit" class="btn btn-light">Login</button>
                                            </center>
                                        </form>

                                        
                            </div>
                    
                </div>
               
            </div>
        </div>
    
</body>
</html>