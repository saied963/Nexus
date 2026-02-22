<?php
session_start();

// Redirect als gebruiker al is ingelogd
if(isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

// Toon eventuele foutmelding
$error = "";
if(isset($_SESSION['register_error'])) {
    $error = $_SESSION['register_error'];
    unset($_SESSION['register_error']);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HustleFit - Registreren</title>
    <link rel="stylesheet" href="Netux.css">
    <style>
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-title {
            text-align: center;
            font-family: 'lemonmilkbold', sans-serif;
            color: #6893BA;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
        }
        
        .register-btn {
            background-color: #6893BA;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            font-family: 'lemonmilkregular', sans-serif;
            transition: background-color 0.3s;
        }
        
        .register-btn:hover {
            background-color: #5a7fa3;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .login-link a {
            color: #6893BA;
            text-decoration: none;
            font-weight: bold;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
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
            <li><img src="Fotos/user_1077114__1_-removebg-preview.png" alt="gebruiker"></li>
            <li><img src="Fotos/bag_3502696-removebg-preview.png" alt="shoppingcart"></li>
        </ul>
    </nav>
    
    <div id="discount">
        <p>10% Korting op alle t-shirts.</p>
    </div>
    
    <div class="register-container">
        <h2 class="form-title">REGISTREREN</h2>
        
        <?php if($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="authentication.php" method="post">
            <input type="hidden" name="action" value="register">
            
            <div class="form-row">
                <div class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" id="voornaam" name="voornaam" required>
                </div>
                
                <div class="form-group">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" id="achternaam" name="achternaam" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="telefoonnummer">Telefoonnummer</label>
                <input type="tel" id="telefoonnummer" name="telefoonnummer">
            </div>
            
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" id="adres" name="adres">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" id="postcode" name="postcode">
                </div>
                
                <div class="form-group">
                    <label for="woonplaats">Woonplaats</label>
                    <input type="text" id="woonplaats" name="woonplaats">
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Bevestig wachtwoord</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            
            <button type="submit" class="register-btn">REGISTREREN</button>
        </form>
        
        <div class="login-link">
            <p>Al een account? <a href="login.php">Log hier in</a></p>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer-hustlefit-homepage">
        <img src="Fotos/Hustlefit logo (1).jpg" alt="Hustlefit" id="hustlefitlogo">
        <ul class="footeritems-hustlefit">
            <li>Over ons</li>
            <li>Contact</li>
            <li>FAQ</li>
        </ul>
        <ul class="sociaalmedia-footer">
            <li><img src="Fotos/x.png" alt="X"></li>
            <li><img src="Fotos/instagramlogohustlefit.png" alt="Instagram"></li>
            <li><img src="Fotos/youtubelogohustlefit.png" alt="YouTube"></li>
        </ul>
    </footer>
    
    <script src="Netux.js"></script>
</body>
</html>