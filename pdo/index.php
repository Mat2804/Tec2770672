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
            <a href="../index.html"><img src="<?php echo URLIMG.'flecha.svg' ?>" alt="" class="coso"></a>
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
                        <a href="showp.php?id=<?=$pet['id']?>"> <img src="<?php echo URLIMG.'lupa.svg' ?>" class="lupa"></a>
                        <a href="editp.php?id=<?=$pet['id']?>"> <img src="<?php echo URLIMG.'editar.png' ?>" class="lapiz"></a>
                        <a href="javascript:;" class="delete" data-id="<?=$pet['id']?>"><img src="<?php echo URLIMG.'basura.svg' ?>" class="basura"></a>

                    </il>
                </ul>
                
                <?php endforeach ?>
            </menu>
        </section>
    </main>
    <script src="<?php echo URLJS.'/jquery-3.7.1.min.js' ?>"></script>
    <script src="<?php echo URLJS.'/sweetalert2.js' ?>"></script>
    <script>
        $(document).ready(function () {
           
            <?php if(isset($_SESSION['msg'])): ?>
                Swal.fire({
                    position: "top-end",
                    title: "Congratulations!",
                    text: "<?php echo $_SESSION['msg'] ?>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                })
                <?php unset($_SESSION['msg']) ?>
            <?php endif ?>

            $('body').on('click', '.delete', function () {
                $id = $(this).attr('data-id')
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
                                                   
                            window.location.replace('delete.php?id=' + $id)
                       
                    }
                })

            })
        })
    </script>
</body>

</html>