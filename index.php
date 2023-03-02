<?php
require 'connexion_bdd.php';
if (isset($_POST['send'])) {
    $req = mysqli_prepare($connexion, "SELECT * FROM images");
    //verifiez que l'image et le texte ont été choisie
    if (isset($_FILES['image']) && isset($_POST['text']) && $_POST['text'] != "") {
    } else {
        //si les champs sont vides on affice un message
        $message = "Veuillez remplir tous les champs !";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="liste.php" class="link">Liste des photos</a>
    <p class="error"><?php if (isset($message)) {
                            echo $message;
                        } ?> </p>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Ajouter une photo</label>
        <input type="file" name="image">
        <label for="">Description</label>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Ajouter" name="send">

    </form>
</body>

</html>