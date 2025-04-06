<?php
$categories = [
    ["name" => "SALES", "link" => "#", "image" => "Fotos/woman-resistance-band.jpg"],
    ["name" => "SPORTKLEDING", "link" => "#", "image" => "Fotos/dumbbells.jpg"],
    ["name" => "ACCESSOIRES", "link" => "#", "image" => "Fotos/kettlebell.jpg"],
    ["name" => "NIEUW", "link" => "#", "image" => "Fotos/water-bottle.jpg"]
];

$popularProducts = [
    ["id" => 1, "name" => "Sporttas", "price" => "€29.99", "image" => "Fotos/tas afbeelding.avif"],
    ["id" => 2, "name" => "Dumbbells 5KG", "price" => "€24.99", "image" => "Fotos/dumbbell afbeelding.jpg"],
    ["id" => 3, "name" => "Kettlebell 10KG", "price" => "€39.99", "image" => "Fotos/kettlebell afbeelding.jpg"],
    ["id" => 4, "name" => "Drinkfles", "price" => "€14.99", "image" => "Fotos/sportfles afbeelding.jpg"]
];

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HustleFit - Sportkleding en Accessoires</title>
    <link rel="stylesheet" href="accessoires.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <div class="logo-icon">H</div>
            HUSTLEFIT
        </div>
        
        <ul class="nav-menu">
            <?php foreach($categories as $category): ?>
                <li><a href="<?php echo $category['link']; ?>"><?php echo $category['name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        
        <div class="user-menu">
            <div class="icon">👤</div>
            <div class="icon">🛒</div>
            <div class="icon">❤️</div>
        </div>
    </header>
    
    <div class="promo-banner">
        
    </div>
    
    <div class="slider">
    <img src="Fotos/anastase-maragos-HyvE5SiKMUs-unsplash.jpg" alt="HustleFit Advertentie" class="slider-image">
    <div class="slider-overlay">
        <h2>TRAIN ZOALS NOOIT TEVOREN</h2>
        <p>Ontdek onze nieuwste fitnesscollectie</p>
    </div>
    <div class="slider-arrow arrow-left">&#10094;</div>
    <div class="slider-arrow arrow-right">&#10095;</div>
</div>
    
    <div class="main-content">
        <h1 class="slogan">GEAR UP. TRAIN HARDER</h1>
        <div class="category-grid">
            <?php foreach($categories as $category): ?>
                <div class="category-card" data-category="<?php echo $category['name']; ?>">
                    <div class="category-image" style="background-image: url('<?php echo $category['image']; ?>')"></div>
                    <div class="category-name"><?php echo $category['name']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="popular-section">
        <h2 class="section-title">Accessoires</h2>
        <div class="product-grid">
            <?php foreach($popularProducts as $product): ?>
                <div class="product-card" data-product-id="<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <div class="product-info">
                        <h3><?php echo $product['name']; ?></h3>
                        <p class="price"><?php echo $product['price']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="accessoires.js"></script>
</body>
</html>