<?php
require "config/app.php";
require "config/database.php";

$pet = getPet($conx, $_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Pet</title>
    <link rel="stylesheet" href="<?php echo URLCSS."/master.css"?>">
</head>

<body>
    <main>
    <header class="nav">
            <a href="index.php"><img src="<?php echo URLIMG.'flecha.svg' ?>" alt="" class="coso"></a>
            <img src="<?php echo URLIMG.'Logo.svg' ?>" alt="Logo">
            <a href=""><img src="<?php echo URLIMG.'menu.svg' ?>" alt="" class="coso"></a>
        </header>
        <section class="show_p">
            <h1>Show Pet</h1>
            
            <div>
            
                <img src="<?php echo URLIMG.$pet['photo']?>" alt="" class="persona">
                <p><?=$pet['name']?></p>
                <p class="r"><?=$pet['kind']?></p>
                <p><?=$pet['age']?></p>
                <p class="r"><?=$pet['weigth']?></p>
                <p><?=$pet['breed']?></p>
                <p class="r"><?=$pet['location']?></p>
                <p>Description</p>
       
            </div>



        </section>
    </main>
    <script src="<?php echo URLJS."/sweetalert2.js"?>"></script>
    <script src="<?php echo URLJS."/jquery-3.7.1.min.js"?>"></script>

</body>

</html>