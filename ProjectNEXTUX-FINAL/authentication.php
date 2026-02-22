<?php
session_start();
require_once 'db_connection.php'; // Gebruik de bestaande database verbinding of maak een nieuwe

// Controleer welke actie er wordt uitgevoerd
if(isset($_POST['action'])) {
    $action = $_POST['action'];
    
    if($action == 'login') {
        handleLogin($conn);
    } else if($action == 'register') {
        handleRegister($conn);
    } else if($action == 'logout') {
        handleLogout();
    }
}

function handleLogin($conn) {
    // Controleer of email en wachtwoord zijn ingevuld
    if(!isset($_POST['email']) || !isset($_POST['password'])) {
        $_SESSION['login_error'] = "Vul alle verplichte velden in.";
        header("Location: login.php");
        exit();
    }
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Valideer email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_error'] = "Voer een geldig e-mailadres in.";
        header("Location: login.php");
        exit();
    }
    
    // Zoek de gebruiker op basis van e-mail
    $stmt = $conn->prepare("SELECT id, voornaam, achternaam, email, wachtwoord FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Controleer het wachtwoord
        if(password_verify($password, $user['wachtwoord'])) {
            // Inloggen geslaagd, sla gebruikersgegevens op in de sessie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['voornaam'] . ' ' . $user['achternaam'];
            $_SESSION['user_email'] = $user['email'];
            
            // Redirect naar het gebruikersprofiel
            header("Location: profile.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Onjuist wachtwoord.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Geen account gevonden met dit e-mailadres.";
        header("Location: login.php");
        exit();
    }
}

function handleRegister($conn) {
    // Controleer of alle verplichte velden zijn ingevuld
    if(!isset($_POST['voornaam']) || !isset($_POST['achternaam']) || !isset($_POST['email']) || 
       !isset($_POST['password']) || !isset($_POST['confirm_password'])) {
        $_SESSION['register_error'] = "Vul alle verplichte velden in.";
        header("Location: register.php");
        exit();
    }
    
    $voornaam = trim($_POST['voornaam']);
    $achternaam = trim($_POST['achternaam']);
    $email = trim($_POST['email']);
    $telefoonnummer = isset($_POST['telefoonnummer']) ? trim($_POST['telefoonnummer']) : null;
    $adres = isset($_POST['adres']) ? trim($_POST['adres']) : null;
    $postcode = isset($_POST['postcode']) ? trim($_POST['postcode']) : null;
    $woonplaats = isset($_POST['woonplaats']) ? trim($_POST['woonplaats']) : null;
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Valideer email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['register_error'] = "Voer een geldig e-mailadres in.";
        header("Location: register.php");
        exit();
    }
    
    // Controleer of de wachtwoorden overeenkomen
    if($password !== $confirm_password) {
        $_SESSION['register_error'] = "Wachtwoorden komen niet overeen.";
        header("Location: register.php");
        exit();
    }
    
    // Controleer wachtwoordsterkte (minimaal 8 tekens)
    if(strlen($password) < 8) {
        $_SESSION['register_error'] = "Wachtwoord moet minimaal 8 tekens lang zijn.";
        header("Location: register.php");
        exit();
    }
    
    // Controleer of e-mail al in gebruik is
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $_SESSION['register_error'] = "Dit e-mailadres is al in gebruik.";
        header("Location: register.php");
        exit();
    }
    
    // Hash het wachtwoord
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Voeg de gebruiker toe aan de database
    $stmt = $conn->prepare("INSERT INTO users (voornaam, achternaam, email, telefoonnummer, adres, postcode, woonplaats, wachtwoord) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $voornaam, $achternaam, $email, $telefoonnummer, $adres, $postcode, $woonplaats, $hashed_password);
    
    if($stmt->execute()) {
        // Registratie geslaagd, toon succesbericht op de login pagina
        $_SESSION['register_success'] = "Je account is succesvol aangemaakt! Je kunt nu inloggen.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['register_error'] = "Er is een fout opgetreden bij het aanmaken van je account. Probeer het later opnieuw.";
        header("Location: register.php");
        exit();
    }
}

function handleLogout() {
    // Verwijder alle sessiegegevens
    session_unset();
    session_destroy();
    
    // Redirect naar de homepagina
    header("Location: Netux.html");
    exit();
}