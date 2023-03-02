<?php
require 'connexion_bdd.php';
$id = $_GET['id'];
$req = mysqli_query($connexion, "DELETE FROM images WHERE id = $id");
header("Location:liste.php");
