<?php
require_once 'db_connection.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// alles ophalen uit de categorie tabel
$sqlCategories = "SELECT * FROM categorie";
$resultCategories = $conn->query($sqlCategories);

$selectedCategory = isset($_GET['category_id']) ? $_GET['category_id'] : null;

// producten ophalen gebaseerd op welke categorie
$sqlProducts = "SELECT p.* FROM product p 
                JOIN categorie c ON p.ID_categorie = c.ID_categorie 
                WHERE c.ID_categorie = ?";

$stmt = $conn->prepare($sqlProducts);
$stmt->bind_param("i", $selectedCategory); 

if ($selectedCategory) {
    $stmt->execute();
    $resultProducts = $stmt->get_result();
} else {
    $sqlProducts = "SELECT p.* FROM product p";
    $resultProducts = $conn->query($sqlProducts); // alle producten weergeven als categorie selecteren niet werkt
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;">
    <title>Netux Herenpagina HustleFit</title>
    <link rel="stylesheet" href="netux_herenpagina.css"> <!--Hier wordt het CSS gekoppeld aan de HTML bestand-->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div id="logo">
            <img src="./Fotos/Hustlefit logo(1).jpg" alt="Logo"> <!--Logo in het navbar-->
        </div>
        <ul class="navbar-menu">
            <li><a href="sales.html">Sales</a></li> <!--Navbar menu-->
            <li><a href="sportkleding.php">Sportkleding</a></li>
            <li><a href="accessoires.php">Accessoires</a></li>
            <li><a href="#">Nieuw</a></li>
            <li><a href="crud_categorie_nexus.php">Categorieën</a></li>
        </ul>
        <div class="logos">
            <img src="./Fotos/heart-removebg-preview.png" alt="favorieten" id="favorite_homepage" width="50px" height="50px"> <!--Meer navbar opties om erop te klikken-->
            <img src="./Fotos/user_1077114__1_-removebg-preview.png" alt="gebruiker" id="user_homepage" width="50px" height="50px">
            <img src="./Fotos/bag_3502696-removebg-preview.png" alt="shoppingcart" id="shoppingcart_homepage" width="50px" height="50px">
        </div>
    </nav>

    <!--header homepage-->
    <section class="header-hustlefit-heren">
        <div class="heerkleding-box">
            <img src="./Fotos/bandan-mohammed-JqCMxXa3z9Q-unsplash.jpg" alt="heerkleding" id="heerkledingheader">
            <p id="herenkleding">Herenkleding</p>
        </div>
    </section>


    <!-- producten weergeven -->
    <div class="producten-lijst">
        <?php
        if ($resultProducts->num_rows > 0) {
            while ($row = $resultProducts->fetch_assoc()) {
                $productNaam = htmlspecialchars($row["naam_product"]);
                $productPrijs = htmlspecialchars($row["prijs_product"]);
                $productAfbeelding = htmlspecialchars($row["afbeelding_product"]);

                // is een afbeelding een link of een lokaal bestand
                $imgSrc = !empty($productAfbeelding) ? (strpos($productAfbeelding, 'http') === 0 ? $productAfbeelding : "Fotos/" . $productAfbeelding) : "Fotos/placeholder.jpg";

                echo "<div class='product'>";
                echo "<h3>{$productNaam}</h3>";
                echo "<p>Prijs: €{$productPrijs}</p>";
                echo "<img src='{$imgSrc}' alt='Product afbeelding' style='width: 150px; height: auto; border: 1px solid #ccc;'>";
                echo "</div>";
            }
        } else {
            echo "<p>Geen producten gevonden voor deze categorie.</p>";
        }
        ?>
    </div>

    <!--footer homepage-->
    <section class="footer-hustlefit-homepage">
        <img src="./Fotos/Hustlefit logo(1).jpg" alt="Hustlefit" id="hustlefitlogo"> <!--Logo in de footer-->
        <div class="footeritems-hustlefit">
            <ul>
                <li>Over ons</li>
                <li>Contact</li> <!--Meer links in de footer-->
                <li>FAQ</li>
            </ul>
        </div>
        <div class="sociaalmedia-footer">
            <ul>
                <li><img src="./Fotos/x.png" alt="X" width="50px" height="50px"></li>
                <li><img src="./Fotos/instagramlogohustlefit.png" alt="Instagram" width="50px" height="50px"></li> <!--Sociaal media links in de footer-->
                <li><img src="./Fotos/youtubelogohustlefit.png" alt="YouTube" width="50px" height="50px"></li>
            </ul>
        </div>
    </section>

    <script src="Netux.js"></script> <!--Javascript bestand wordt gekoppeld aan de HTML bestand-->
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
