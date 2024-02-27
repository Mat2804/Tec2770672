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
    <title>Edit pet</title>
    <link rel="stylesheet" href="<?php echo URLCSS."/master.css"?>">
</head>

<body>
    <main>
    <header class="nav">
            <a href="index.php"><img src="<?php echo URLIMG.'flecha.svg' ?>" alt="" class="coso"></a>
            <img src="<?php echo URLIMG.'Logo.svg' ?>" alt="Logo">
            <a href=""><img src="<?php echo URLIMG.'menu.svg' ?>" alt="" class="coso"></a>
        </header>
        <section class="edit_u">
            <h1>Edit</h1>



            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$pet['id']?>">
                <img src="<?php echo URLIMG.$pet['photo']?>" alt="" class="upload" id="upload">
                <input type="file" name="photo" id="photo" accept="image/*"></input>
                <input type="text" name="name" placeholder="Name" required value="<?=$pet['name']?>"></input>
                <input type="text" name="age" placeholder="Age" required value="<?=$pet['age']?>"></input>
                <input type="text" name="kind" placeholder="Kind" required value="<?=$pet['kind']?>"></input>
                <input type="text" name="weigth" placeholder="Weigth" required value="<?=$pet['weigth']?>"></input>
                <input type="text" name="location" placeholder="Location" required value="<?=$pet['location']?>"></input>
                <input type="text" name="breed" placeholder="Breed" required value="<?=$pet['breed']?>"></input>
                <input type="text" name="description" placeholder="Description" required value="Description"></input>
                <button type="submit">UPDATE</button>
            </form>
            <?php 

if ($_POST){
    if(!empty($_FILES['photo']['name'])) {
        $photo = time() . "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $data = [
            'id'       => $_POST['id'],
            'name'     => $_POST['name'],
            'photo'    => $photo,
            'kind'     => $_POST['kind'],
            'weigth'   => $_POST['weigth'],
            'age'      => $_POST['age'],
            'breed'    => $_POST['breed'],
            'location' => $_POST['location']
        ];
    } else {
        $data = [
            'id'       => $_POST['id'],
            'name'     => $_POST['name'],
            'kind'     => $_POST['kind'],
            'weigth'   => $_POST['weigth'],
            'age'      => $_POST['age'],
            'breed'    => $_POST['breed'],
            'location' => $_POST['location']
        ];
    }

    if (updatePet($conx, $data)) {
        if (!empty($_FILES['photo']['name'])) {
        move_uploaded_file($_FILES['photo']['tmp_name'], "../Wireframe/images/" . $photo);
        }
        header("Location: index.php");
} 

}



?>


        </section>
    </main>
    <script src="<?php echo URLJS."/sweetalert2.js"?>"></script>
    <script src="<?php echo URLJS."/jquery-3.7.1.min.js"?>"></script>
    <script>
        $(document). ready (function () {
            $('#upload').click(function (e) {
                e.preventDefault()
                $('#photo').click()
            })

            $('#photo').change(function (e) {
                e.preventDefault()
                let reader= new FileReader()
                reader.onload=function(event) {
                    $('#upload').attr("src",event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })
        });

        
    </script>

</body>

</html>