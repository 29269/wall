<?php
require 'includes/functions.php';
loginIfNeeded();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dit is het projecr van Ruben Cali en Duneya Saleh en het heet The Wall.">
    <meta name="keywords" content="THE WALL, PROJECT, THE WALL PROJECT, ">
    <title>THE WALL | ADD POST</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
    <link rel="stylesheet" href="css/edit.css">
    <script src="https://kit.fontawesome.com/f28585beb5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <a href="ingelogd.php" class="index">
        <div class="whole"></div>
    </a>
    <div class="blok"></div>
    <?php
        $query = "SELECT * FROM post WHERE id = $id";
        $statement = $connection->query($query);
        foreach ($statement as $nummer => $row) ?>
    <section id="registreren">
        <h1><?php echo $row['titelPost'] ?></h1>
       

        <div class="form" id= "lightbox">
            <form action="update.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="gebruikersnaam">
                    <div>
                        <img src="uploads/<?php echo $row['img'] ?>" alt="" class="img">
                    </div>
                    <div class="titel">
                        <h2><?php echo $row['titelPost'] ?></h2>

                        <h2><?php echo $row['beschrijving'] ?></h2>
                    </div>

                    <div class="buttons">
                        <a href="ingelogd.php" class="button2">Cancel</a>
                    </div>


            </form>
        </div>
    </section>

    <nav>
        <img src="img/LogoTHeWall.png" alt="">
        <ul>
            <li class="register1"><a href="loguit.php" class="button registreer">SIGN OUT</a></li>
        </ul>
    </nav>
    <div class="grid">
        <?php
        foreach ($statement as $row) {
        ?>

            <div class="top">
                <div class="person">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <img src="<?php echo $row['img'] ?>" alt="" class="img">
                </div>
                <div class="textt">
                    <h2>
                        <?php echo $row['titelPost'] ?>
                    </h2>

                    <p>
                        <?php echo $row['beschrijving'] ?>
                    </p>

                </div>
            </div>

        <?php } ?>
    </div>
    <div class="footer" id="boxfooter">
        <p>&copy; 2020, Ruben Cali & Duneya Saleh</p>
    </div>
</body>

</html>