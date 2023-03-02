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
    <p class="error">Veuillez remplir le formulaire</p>
    <form action="" method="POST">
        <label for="">Ajouter une photo</label>
        <input type="file" name="image">
        <label for="">Description</label>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Ajouter">

    </form>
</body>

</html>