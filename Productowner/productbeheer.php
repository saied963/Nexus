<?php
// Laad de databaseverbinding
include 'db_connect.php';

// Laad de product functies
include 'product_functions.php';

// Controleer of een formulier is ingediend en roep de juiste functie aan
if (isset($_POST['toevoegen'])) {
    $leverancier = $_POST['leverancier'];
    $categorie = $_POST['categorie'];
    $productnaam = $_POST['productnaam'];
    voegProductToe($leverancier, $categorie, $productnaam, $conn);
}

if (isset($_POST['bijwerken'])) {
    $id = $_POST['product_id'];
    $leverancier = $_POST['leverancier'];
    $categorie = $_POST['categorie'];
    $productnaam = $_POST['productnaam'];
    werkProductBij($id, $leverancier, $categorie, $productnaam, $conn);
}

if (isset($_POST['verwijderen'])) {
    $id = $_POST['product_id'];
    verwijderProduct($id, $conn);
}

// Haal de productlijst op
$result = $conn->query("SELECT * FROM producten");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productbeheer</title>
</head>
<body>
    <h2>Nieuw product toevoegen</h2>
    <form method="post">
        Leverancier ID: <input type="number" name="leverancier" required><br>
        Categorie ID: <input type="number" name="categorie" required><br>
        Productnaam: <input type="text" name="productnaam" required><br>
        <button type="submit" name="toevoegen">Toevoegen</button>
    </form>

    <h2>Product bijwerken</h2>
    <form method="post">
        Product ID: <input type="number" name="product_id" required><br>
        Leverancier ID: <input type="number" name="leverancier" required><br>
        Categorie ID: <input type="number" name="categorie" required><br>
        Productnaam: <input type="text" name="productnaam" required><br>
        <button type="submit" name="bijwerken">Bijwerken</button>
    </form>

    <h2>Product verwijderen</h2>
    <form method="post">
        Product ID: <input type="number" name="product_id" required><br>
        <button type="submit" name="verwijderen">Verwijderen</button>
    </form>

    <h2>Productlijst</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Leverancier</th>
            <th>Categorie</th>
            <th>Productnaam</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['leverancier'] ?></td>
                <td><?= $row['categorie'] ?></td>
                <td><?= htmlspecialchars($row['productnaam']) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
