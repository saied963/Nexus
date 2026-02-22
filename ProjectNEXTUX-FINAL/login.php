<?php
session_start();

// Redirect als gebruiker al is ingelogd
if(isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

// Toon eventuele foutmelding
$error = "";
if(isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

// Toon eventuele succesbericht na registratie
$success = "";
if(isset($_SESSION['register_success'])) {
    $success = $_SESSION['register_success'];
    unset($_SESSION['register_success']);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HustleFit - Login</title>
    <link rel="stylesheet" href="Netux.css">
    <style>
        .login-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 100px;
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
        
        .login-btn {
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
        
        .login-btn:hover {
            background-color: #5a7fa3;
        }
        
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .register-link a {
            color: #6893BA;
            text-decoration: none;
            font-weight: bold;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .error-message {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        
        .success-message {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
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
            <li>
                <!-- Aangepaste gebruikerslink -->
                <a href="<?php echo isset($_SESSION['user_id']) ? 'profile.php' : 'login.php'; ?>">
                    <img src="Fotos/user_1077114__1_-removebg-preview.png" alt="gebruiker">
                </a>
            </li>
            <li><img src="Fotos/bag_3502696-removebg-preview.png" alt="shoppingcart"></li>
        </ul>
    </nav>
    
    <div id="discount">
        <p>10% Korting op alle t-shirts.</p>
    </div>
    
    <div class="login-container">
        <h2 class="form-title">INLOGGEN</h2>
        
        <?php if($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if($success): ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <form action="authentication.php" method="post">
            <input type="hidden" name="action" value="login">
            
            <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-btn">INLOGGEN</button>
        </form>
        
        <div class="register-link">
            <p>Nog geen account? <a href="register.php">Registreer hier</a></p>
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