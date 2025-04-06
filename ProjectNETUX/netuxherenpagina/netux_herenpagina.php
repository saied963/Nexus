<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "nexus";
//Database connectie

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}


?>







<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;">
    <title>Netux Herenpagina HustleFit</title>
    <link rel="stylesheet" href="Netux.css"> <!--Hier wordt het CSS gekoppeld aan de HTML bestand-->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div id="logo">
            <img src="Hustlefit logo(1).jpg" alt="Logo"> <!--Logo in het navbar-->
        </div>
        <ul class="navbar-menu">
            <li><a href="#">Sales</a></li> <!--Navbar menu-->
            <li><a href="#">Sportkleding</a></li>
            <li><a href="#">Accessoires</a></li>
            <li><a href="#">Nieuw</a></li>
        </ul>
        <div class="logos">
            <!-- Voeg hier je logo's toe -->
            <img src="heart-removebg-preview.png" alt="favorieten" id="favorite_homepage" width="50px" height="50px"> <!--Meer navbar opties  om erop te klikken-->
            <img src="user_1077114__1_-removebg-preview.png" alt="gebruiker" id="user_homepage" width="50px" height="50px">
            <img src="bag_3502696-removebg-preview.png" alt="shoppingcart" id="shoppingcart_homepage" width="50px" height="50px">
            
        </div>
    </nav>

    <!--header homepage-->
    <section class="header-hustlefit-heren">
        <img src="bandan-mohammed-JqCMxXa3z9Q-unsplash.jpg" alt="heerkleding" width="50px" height="50px">
        <h1 id="herenkleding">Herenkleding</p>
         </div>
    </section>

    <!--herenkleding sectie-->
    <section class="herensectie">
        <div class="filtersheren">
            <div class="maatheren">Maat</div>
            <ul>
            <li>L</li>
            <li>XL</li>
            <li>S</li>
            <li>XS</li>
            <li>XXL</li>
            <li>M</li>
        </ul>
        <div class="kleurheren">Kleur</div>
        <ul>
            <li>Blauw</li>
            <li>Zwart</li>
            <li>Wit</li>
            <li>Groen</li>
            <li>Rood</li>
            <li>Paars</li>
        </ul>
        <div class="prijsheren">Prijs</div>
        <ul>
            <li>1-50</li>
            <li>50-100</li>
            <li>100-150</li>
            <li>200-250</li>
            <li>300-350</li>
            <li>400-450</li>
        </ul>
        <div class="merkheren">Merk</div>
        <ul>
            <li>Nike</li>
            <li>Adidas</li>
            <li>Puma</li>
            <li>Champion</li>
            <li>Asics</li>
            <li>Columbia</li>
        </ul>

        <div class="selectieheren">
    <ul>
        <li>Heren</li>
        <li>Hoodies</li>
        <li>Trainingsbroeken</li>
        <li>Sportschoenen</li>
        <li>Accessoires</li>
        <li>T-shirts</li>
    </ul>
</div>
</div> <!-- END of filtersheren -->





<!-- ✅ NOW move the product output outside the filters -->
<div class="producten-container">
<?php
    $sql = "SELECT p.* FROM product p
    JOIN categorie c ON p.ID_categorie = c.ID_categorie
    WHERE c.categorie_naam = 'mannen'";

    $result = $conn->query($sql);

    // Toon producten
if ($result->num_rows > 0) {
    echo "<div class='producten-lijst'>";
    while($row = $result->fetch_assoc()) {
        $productNaam = htmlspecialchars($row["naam_product"]);
        $productPrijs = htmlspecialchars($row["prijs_product"]);
        $productAfbeelding = htmlspecialchars($row["afbeelding_product"]);

        // Check if the image is an external URL or local
        if (!empty($productAfbeelding)) {
            $isExternal = (strpos($productAfbeelding, 'http') === 0);
            $imgSrc = $isExternal ? $productAfbeelding : "images/" . $productAfbeelding;
        } else {
            $imgSrc = "images/placeholder.jpg"; // fallback image
        }

        echo "<div class='product'>";
        echo "<h3>{$productNaam}</h3>";
        echo "<p>Prijs: €{$productPrijs}</p>";
        echo "<img src='{$imgSrc}' alt='Product afbeelding' style='width: 150px; height: auto; border: 1px solid #ccc;'>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "Geen producten gevonden.";
}

    $conn->close();
?>
</div>

        
    </section>
</body>
</html>






