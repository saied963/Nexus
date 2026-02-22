<?php
// product_functions.php

// Functie voor het toevoegen van een nieuw product
function voegProductToe($leverancier, $categorie, $productnaam, $conn) {
    $sql = "INSERT INTO producten (leverancier, categorie, productnaam)
            VALUES ('$leverancier', '$categorie', '$productnaam')";
    return $conn->query($sql);
}

// Functie voor het bijwerken van een product
function werkProductBij($id, $leverancier, $categorie, $productnaam, $conn) {
    $sql = "UPDATE producten
            SET leverancier='$leverancier', categorie='$categorie', productnaam='$productnaam'
            WHERE id='$id'";
    return $conn->query($sql);
}

// Functie voor het verwijderen van een product
function verwijderProduct($id, $conn) {
    $sql = "DELETE FROM producten WHERE id='$id'";
    return $conn->query($sql);
}
?>
