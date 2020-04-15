<?php
require 'includes/functions.php';
loginIfNeeded();

 ?>


  


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Dit is het projecr van Ruben Cali en Duneya Saleh en het heet The Wall.">
        <meta name="keywords" content="THE WALL, PROJECT, THE WALL PROJECT, ">
        <title>THE WALL | LOGGED IN</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
        <link rel="stylesheet" href="css/ingelogd.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>

        <nav>
        <img src="img/LogoTHeWall.png" alt="">
        <h3 class="user">Welkom, <span id="loggedInUser"><?php echo $_SESSION['gebruikersnaam'] ?></span></h3>
            <ul>
          
              

               <li class="register1"><a href="loguit.php" class="button registreer">SIGN OUT</a></li>
            </ul>
        </nav>
        <div class="grid">
        <?php
foreach ($statement as $row){
    ?>
     
            <div class="top" class="small">
                <div class="person">
                 <i class="fas fa-user"></i>
                </div>
                <a href="lightbox.php">
            <div>
                <img src="uploads/<?php echo $row['img']?>" alt="" class="img">
            </div>
</a>
             <div class="textt">
               <h2>
                   <?php echo $row['titelPost'] ?>
                </h2>
               
               <p>
                   <?php echo $row['beschrijving']?>
                </p>
              
                </div>  
                <div class="ingelogd">
                <a href="delete.php?id=<?php echo $row['id']?>"><i class="fa fa-trash"></i></a>
                <a href="edit.php?id=<?php echo $row['id']?>"><i class="fa fa-paint-brush"></i></a>
</div>
            </div>
       
<?php } ?>

</div>
<div class="big">
<?php
$query = "SELECT * FROM post WHERE id = $id";
foreach ($statement as $row){
    ?>
     
            <div class="top" class="kleine">
                <div class="person">
                 <i class="fas fa-user"></i>
                </div>
            <div>
                <img src="uploads/<?php echo $row['img']?>" alt="" class="img">
            </div>
             <div class="textt">
               <h2>
                   <?php echo $row['titelPost'] ?>
                </h2>
               
               <p>
                   <?php echo $row['beschrijving']?>
                </p>
              
                </div>  
                <div class="ingelogd">
                <a href="delete.php?id=<?php echo $row['id']?>"><i class="fa fa-trash"></i></a>
                <a href="edit.php?id=<?php echo $row['id']?>"><i class="fa fa-paint-brush"></i></a>
</div>
            </div>
       
<?php } ?>




</div>

<div class="postToe">
   <a href="form.php"><h2>Add post <i class="fas fa-plus"></i></h2></a>
</div>
<div class="footer">
    <p>&copy; 2020, Ruben Cali & Duneya Saleh</p>
</div>
<script src="https://kit.fontawesome.com/f28585beb5.js" crossorigin="anonymous"></script>
<script src="js/lightbox.js"></script>
    </body>

    </html>