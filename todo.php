<?php 
require 'db_conn.php';

if (isset($_GET['id'])) {
   $ID = $_GET['id'];
   $stmt  = $conn->prepare('DELETE FROM todos WHERE id = '.$ID);
   $stmt->execute();
}

session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To_Do_List | Home</title>
     <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"crossorigin="anonymous">

    <!-- JS Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <!-- Link to css -->
        <link rel="stylesheet" href="css\style.css">

    <!-- link to js -->
        <script src="js\script.js"></script>

    <!-- link to js query -->
        <script src="js\jquery-3.2.1.min.js"></script>

     <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/f84ba90e3b.js" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images\5aa78e137603fc558cffbf17.png" type="image/x-icon">

</head>
<body>
    
    



    <div class="main-section">
      
       
       <div class="add-section">
        
          <form action="app/add.php" method="POST" autocomplete="off">
            <div class="container">
                <div class="row">
                    <div class="col">
                    
                            <p>
                                Welcome, <?php echo $_SESSION['name']; ?> !
                            </p>
            
                    </div>
                    <div class="col">
                    <a href="logout.php" style="color : black; margin-left : 60%">LogOut<i class="fas fa-sign-out-alt" style="color: #34495e"></i></a>
                    </div>
                </div>
            </div>
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }
             else
             { 
                 ?>
              <input type="text" name="title" placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php 
            } 
                ?>
          </form>
       </div>
       <?php 
          $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="images\f.png" width="100%" />
                        <img src="images\Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
           
                <div class="todo-item">
                    <span id="" class="remove-to-do"> <a href="todo.php?id=<?php echo $todo['id'];?>"> <i class="far fa-trash-alt"></i> </a> </span>
                    <?php if($todo['checked']){ ?> 
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>

                    
                   <a href="done.php?id=<?php echo $todo['id'];?>"> <i class="fas fa-check"></i></a> 
                   
                        
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
            
       </div>
    </div>



</body>
</html>

<?php
}
else{
    header("location:index.php");
    exit();
}
        

?>
