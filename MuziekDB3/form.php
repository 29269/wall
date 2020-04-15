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
        <title>THE WALL | PROJECT</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
        <link rel="stylesheet" href="css/form.css">
        <script src="https://kit.fontawesome.com/f28585beb5.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>
        <a href="index.php" class="index">
        <div class="whole"></div>
        </a>
          <div class="blok"></div>
 
        <section id="registreren">
            <h1>POST TOEVOEGEN</h1>
          
                
                    <div class="form">
                    <form action="proces.php" method="POST" enctype="multipart/form-data">
                        <div class="gebruikersnaam">
                           <h2> <label>Image: </label></h2>
                           <input type="file" name="image" accept="image/*" required>
                           </div>

                           <div class="email">
                           <h2> <label>Titel bij de post:</label></h2>
                           <input type="text" name="titelPost" required>
                           </div>

                           <div class="ww">
                            <h2> <label>beschrijving bij de post:</label></h2>
                          <input type="text" name="beschrijving" required>
                          </div>
                          <div class="buttons">
                          <a href="ingelogd.php" class="button2">Cancel</a>
                            <button type="submit" class="button">Confirm</button>
                            </div>
                        

                        </form>
         
                </div>
        </section>

        <nav>
        <img src="img/LogoTHeWall.png" alt="">
            <ul>
          
                <li class="login1"><a href="login.php" class="button button-add login">LOGIN</a>   </li>

               <li class="register1"><a href="register.php" class="button registreer">REGISTREER</a></li>
            </ul>
        </nav>
        <div class="grid">
        <?php
foreach ($statement as $row){
    ?>
     
            <div class="top">
                <div class="person">
                <i class="fas fa-user"></i>
                </div>
            <div>
                <img src="<?php echo $row['img']?>" alt="" class="img">
            </div>
            <div class="textt">
               <h2>
                   <?php echo $row['titelPost'] ?>
                </h2>
               
               <p>
                   <?php echo $row['beschrijving']?>
                </p>
              
</div>  
            </div>
       
<?php } ?>
</div>
<div class="footer">
    <p>&copy; 2020, Ruben Cali & Duneya Saleh</p>
</div>
    </body>

    </html>
    