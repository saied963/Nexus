<?php
// auteur: Ivanov
// functie: verwijder een leverancier op basis van de id
include 'functions_leverancier.php';
 
// Haal leverancier uit de database
if(isset($_GET['id'])){
    DeleteLeverancier($_GET['id']);
 
    echo '<script>alert("Id: ' . $_GET['id'] . ' is verwijderd")</script>';
    echo "<script> location.replace('crud_leverancier.php'); </script>";
}
?>