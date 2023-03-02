<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <a href="index.php" class="link">Ajouter une photo</a>
        <?php
        require 'connexion_bdd.php';

        //afficher la liste des photos qui sont das la bdd
        $req = mysqli_query($connexion, "SELECT * FROM images");

        //verifier la liste des photos qui sont dans la bdd
        if (mysqli_num_rows($req) < 1) {
        ?>
            <p class="vide_message">La liste des photos est vide</p>
        <?php
        }
        //afficher la liste des photos

        while ($row = mysqli_fetch_assoc($req)) {
        ?>
            <div class="box">
                <img class="img_principal" src="images_bdd/<?= $row['img'] ?>">
                <div> <?= $row['texte'] ?></div>
                <a href="delete.php?id=<?= $row['id'] ?>" class="delete_btn">
                    <img src="img/delete1.png">
                </a>
            </div>

        <?php
        }
        ?>


    </section>
</body>

</html>