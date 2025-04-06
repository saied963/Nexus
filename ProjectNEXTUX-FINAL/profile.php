<?php
session_start();

// Controleer of de gebruiker is ingelogd
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Haal gebruikersgegevens op uit de database
require_once 'db_connection.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Controleer of de gebruiker bestaat
if(!$user) {
    // Gebruiker niet gevonden, sessie ongeldig maken
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Controleer of er een succesbericht is
$success_message = "";
if(isset($_SESSION['profile_success'])) {
    $success_message = $_SESSION['profile_success'];
    unset($_SESSION['profile_success']);
}

// Controleer of er een foutmelding is
$error_message = "";
if(isset($_SESSION['profile_error'])) {
    $error_message = $_SESSION['profile_error'];
    unset($_SESSION['profile_error']);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HustleFit - Mijn Profiel</title>
    <link rel="stylesheet" href="Netux.css">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        
        .profile-title {
            font-family: 'lemonmilkbold', sans-serif;
            color: #6893BA;
        }
        
        .logout-btn {
            background-color: #f5f5f5;
            color: #666;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #e0e0e0;
        }
        
        .profile-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-family: 'lemonmilkregular', sans-serif;
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
        }
        
        .profile-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .detail-item {
            margin-bottom: 10px;
        }
        
        .detail-label {
            font-weight: bold;
            color: #666;
            font-size: 14px;
        }
        
        .detail-value {
            color: #333;
            font-size: 16px;
        }
        
        .edit-profile-btn {
            background-color: #6893BA;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            font-family: 'lemonmilkregular', sans-serif;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        
        .edit-profile-btn:hover {
            background-color: #5a7fa3;
        }
        
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            font-weight: bold;
            color: #666;
        }
        
        .tab.active {
            border-color: #6893BA;
            color: #6893BA;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .order-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .order-table th, .order-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .order-table th {
            font-weight: bold;
            color: #444;
            background-color: #f9f9f9;
        }
        
        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        
        .error-message {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        
        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }
        
        .wishlist-item {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        
        .wishlist-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 0;
            color: #777;
        }
        
        .empty-state p {
            margin-bottom: 20px;
        }
        
        .shop-now-btn {
            background-color: #6893BA;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            font-family: 'lemonmilkregular', sans-serif;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .shop-now-btn:hover {
            background-color: #5a7fa3;
        }

        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div id="logo">
            <a href="Netux.html">
                <img src="Fotos/Hustlefit logo (1).jpg" alt="Logo">
            </a>
        </div>
        
        <ul class="navbar-menu">
            <li><a href="sales.html">Sales</a></li>
            <li><a href="#">Sportkleding</a></li>
            <li><a href="accessoires.php">Accessoires</a></li>
            <li><a href="#">Nieuw</a></li>
        </ul>
        
        <ul class="navbar-icons">
            <li><img src="Fotos/heart-removebg-preview.png" alt="favorieten"></li>
            <li><a href="profile.php"><img src="Fotos/user_1077114__1_-removebg-preview.png" alt="gebruiker"></a></li>
            <li><img src="Fotos/bag_3502696-removebg-preview.png" alt="shoppingcart"></li>
        </ul>
    </nav>
    
    <div id="discount">
        <p>10% Korting op alle t-shirts.</p>
    </div>
    
    <div class="profile-container">
        <div class="profile-header">
            <h2 class="profile-title">MIJN PROFIEL</h2>
            <form action="authentication.php" method="post">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="logout-btn">Uitloggen</button>
            </form>
        </div>
        
        <?php if($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        
        <?php