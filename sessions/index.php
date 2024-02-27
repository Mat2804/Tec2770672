<?php
require "config/app.php";
require "config/database.php";
$pets= getAllPets($conx);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Pets</title>
    <link rel="stylesheet" href= "<?php echo URLCSS."/master.css"?>">
</head>

<body>
    <main>
        <header class="nav">
            <a href="../html/dashboard.html"><img src="<?php echo URLIMG.'flecha.svg' ?>" alt="" class="coso"></a>
            <img src="<?php echo URLIMG.'Logo.svg' ?>" alt="Logo">
            <a href=""><img src="<?php echo URLIMG.'menu.svg' ?>" alt="" class="coso"></a>
        </header>
        <section class="mp">
            <h1>Modules Pets</h1>
            <button type="submit"><a href="../pdo/addp.php"><img src="../images/plus.svg" alt=""> Add pet</a></button>
            <menu>
            <?php foreach($pets as $pet): ?>
                <main>
        <header class="login">
            <img src="../images/logolo.svg" alt="Logo">
        </header>
        <section class="login">
            <menu>
                <a href="#">Login</a>
                <a href="register.html">Register</a>
            </menu>
            <form action="dasboard.html" method="post">
                <h2>Email:</h2>
                <input type="email" name="email"  required></input>
                <h2 class="password">Password:</h2>
                <input type="password" name="password" required></input>
                <button type="submit"><a href="dashboard.html">Login</a></button>
            </form>
        </section>
    </main>
                
                <?php endforeach ?>
            </menu>
        </section>
    
    <script src="<?php echo URLJS.'/jquery-3.7.1.min.js' ?>"></script>
    <script src="<?php echo URLJS.'/sweetalert2.js' ?>"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '.delete', function () {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#BC6C25",
                    cancelButtonColor: "#283618",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "the user has been deleted.",
                            icon: "success"
                        })
                    }
                })

            })
        })
    </script>
</body>

</html>