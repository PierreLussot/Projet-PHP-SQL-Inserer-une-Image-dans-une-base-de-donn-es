<?php
$connexion = mysqli_connect('localhost', 'root', 'root', 'image');
if (!$connexion) {
    die('Erreur : ' . mysqli_connect_error());
}
//echo "connexion réussie";
