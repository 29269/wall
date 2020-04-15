<?php
require 'includes/functions.php';

$errors = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    if(empty($email)){
        $errors['email'] = 'E-mail addres is niet ingevuld';
    }
    if(empty($wachtwoord)){
        $errors['wachtwoord'] = 'Wachtwoord is niet ingevuld';
    }
    if( count($errors) === 0){
        $connection = dbConnect();

        $sql = 'SELECT * FROM gebruikers WHERE email = :email';
        $statement = $connection->prepare($sql);

        $params = [
            'email' => $email
        ];
        $statement->execute($params);

        if($statement->rowCount() === 1){
            $gebruiker = $statement->fetch();
            if(password_verify($wachtwoord, $gebruiker['wachtwoord'])){
               $_SESSION['user_id'] = $gebruiker['id'];
               $_SESSION['gebruikersnaam'] = $gebruiker['gebruikersnaam'];

               header('location: ingelogd.php ');
               exit();
            }
            else{
                $errors['wachtwoord'] = "wachtwoord is niet correct"; 
            }
        }
    }

}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Dit is het projecr van Ruben Cali en Duneya Saleh en het heet The Wall.">
        <meta name="keywords" content="THE WALL, PROJECT, THE WALL PROJECT, ">
        <title>THE WALL | LOGIN</title>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
        <link rel="stylesheet" href="css/login.css">
        <script src="https://kit.fontawesome.com/f28585beb5.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <body>
        <a href="index.php" class="index">
        <div class="whole"></div>
        </a>
          <div class="blok"></div>
 
        <section id="registreren">
            <h1>LOGIN</h1>
          
                
                    <div class="form">
                        <form action="login.php" method="POST">
                           <div class="email">
                           <h2> <label>Email:</label></h2>
                            <input type="email" name="email" value="<?php if(isset($email)):?><?php echo $email ?><?php endif; ?>">
                           <?php if(isset($errors['email'])):?>
                           <span class="errors"> <?php echo $errors['email']?></span>
                           <?php endif; ?>
                           </div>
                           <div class="ww">
                            <h2> <label>Password:</label></h2>
                          <input type="password" name="wachtwoord" >
                          <?php if(isset($errors['wachtwoord'])):?>
                           <span class="errors"> <?php echo $errors['wachtwoord']?></span>
                           <?php endif; ?>
                          </div>
</div class="buttons">
                          <a href="index.php" class="button2">Cancel</a>
                            <button type="submit" class="button">Login</button>
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
            </div>
       
<?php } ?>
</div>
<div class="footer">
    <p>&copy; 2020, Ruben Cali & Duneya Saleh</p>
</div>
    </body>

    </html>