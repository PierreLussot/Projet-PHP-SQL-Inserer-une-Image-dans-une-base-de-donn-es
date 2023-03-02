<?php
require 'connexion_bdd.php';
if (isset($_POST['send'])) {
    //verifiez que l'image et le texte ont été choisie
    if (isset($_FILES['image']) && isset($_POST['text']) && $_POST['text'] != "") {
        //on recupere dabor le nom de l'image
        $img_nom = $_FILES['image']['name'];

        //Nous définisson un nom temporaire 
        $tmp_nom = $_FILES['image']['tmp_name'];

        //On recupere a l'heure actuelle
        $time = time();

        //on renomme l'image en utilisant cette formule heure + nom de l'image (Pour avoir des images unique)
        $nouveau_nom_img = $time . $img_nom;

        //on deplace l'image danns un dossier apelleé "image_bdd"
        $deplacer_img = move_uploaded_file($tmp_nom, "images_bdd/" . $nouveau_nom_img);

        if ($deplacer_img) {
            //si l'image a été mis dans le dossier
            //insérons le texte et le nom de l'image dans la bdd
            $text = $_POST['text'];
            $req = mysqli_query($connexion, "INSERT INTO images(img,texte) VALUES ('$nouveau_nom_img','$text')");

            //verifier que la requete fonctione
            if ($req) {

                //si oui
                header("Location:liste.php");
            } else {
                //si nom
                $message = "Echec de l'ajout de l'image !";
            }
        } else {
            //si non
            $message = "Veuillez choisir une image avec une taille inferieur a 1Mo";
        }
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