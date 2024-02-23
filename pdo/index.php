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
                <ul>
                    <il>

                        <img src="<?php echo URLIMG.$pet["photo"] ?>" alt="" class="persona">
                        <h2><?php echo $pet["name"] ?></h2>
                        <a href="../html/showp.html"> <img src="<?php echo URLIMG.'lupa.svg' ?>" class="lupa"></a>
                        <a href="../html/editp.html"> <img src="<?php echo URLIMG.'editar.png' ?>" class="lapiz"></a>
                        <a href="javascript:;" class="delete"><img src="<?php echo URLIMG.'basura.svg' ?>" class="basura"></a>

                    </il>
                </ul>
                
                <?php endforeach ?>
            </menu>
        </section>
    </main>
    <script src="../js/sweetalert2.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
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