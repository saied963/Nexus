# HustleFit - Sportkleding Webshop

Een fictieve webshop voor sportkleding en accessoires. Dit project is ontwikkeld als groepsopdracht tijdens het eerste leerjaar van de MBO-opleiding Software Developer (niveau 2). Het doel was om een functionele website te bouwen met producten, gebruikers, inlogfunctionaliteit en een productweergave uit een database.

> **Let op:** Dit is een schoolproject en bevat nog enkele kleine verbeterpunten.

## Inhoudsopgave

- Functionaliteiten
- Gebruikte technologieen
- Installatie
- Database instellen
- Bestandsstructuur
- Team en bijdragen
- Screenshots
- Toekomstige verbeteringen
- Licentie

---

## Functionaliteiten

- **Homepagina** (`Netux.html`) met hero-sectie, categorieen en een wintercollectie.
- **Productpagina's**:
  - Herenpagina (`Netux_herenpagina.php`) - haalt producten uit de database van categorie 'mannen'.
  - Damespagina (`dames.html`) - statisch voorbeeld.
  - Kindermode (`kids.html`) - statisch voorbeeld.
  - Accessoires (`accessoires.php`) - toont categorieen en producten.
  - Sales (`sales.html`) - statische aanbiedingenpagina.
- **Gebruikerssysteem**:
  - Registratie (`register.php`) met wachtwoordvalidatie en hashing (password_hash).
  - Inloggen (`login.php`) met sessiebeheer.
  - Profielpagina (`profile.php`) voor ingelogde gebruikers.
  - Uitlogfunctionaliteit via `authentication.php`.
- **Databasekoppeling** via MySQLi (prepared statements voor veiligheid).
- **Responsive design** voor mobiel en tablet (media queries).
- **Eenvoudige JavaScript-interacties** (alerts bij knoppen, console logs voor toekomstige functionaliteit).

---

## Gebruikte technologieën

- **Frontend**: HTML5, CSS3, JavaScript (ES6)
- **Backend**: PHP (zonder framework)
- **Database**: MySQL (via phpMyAdmin)
- **Server**: Apache XAMPP
- **Versiebeheer**: Handmatig gedeeld

---

## Installatie

Volg onderstaande stappen om het project lokaal te draaien.

### Vereisten
- Een webserver met PHP (bijv. XAMPP, WAMP, MAMP)
- MySQL
- Een browser (Chrome, Firefox, Edge)

### Stappen
1. **Download of clone het project**  
   Plaats de bestanden uit de map 'hustlefit' in de Nexus repo in Github in de map `htdocs` (XAMPP) of `www` (WAMP).  
   Padnaam: `C:\xampp\htdocs\hustlefit`

2. **Start de webserver en MySQL** via het controlepaneel van XAMPP/WAMP.

3. **Importeer de database** (zie volgende sectie).

4. **Pas database-instellingen aan**  
   In `db_connection.php` staan de standaardwaarden voor localhost/root/leeg wachtwoord.  
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $dbname = "nexus";
   ```
   Pas aan indien nodig.

5. **Open de website**  
   Ga naar `http://localhost/hustlefit/Netux.html` (of de mapnaam die je hebt gekozen).

---

## 🗄 Database instellen

1. Open phpMyAdmin via `http://localhost/phpmyadmin`.
2. Maak een nieuwe database aan met de naam **`nexus`**.
3. Importeer het bestand `nexus (1).sql` (meegeleverd in het project) in de database `nexus`.
4. Controleer of de tabellen `categorie`, `product`, `users` en eventueel `klanten` zijn aangemaakt.

**Voorbeeldgegevens**  
De tabel `product` bevat al enkele producten voor de herencategorie. De tabel `users` bevat een testgebruiker:
- Email: ff@gmail.com
- Wachtwoord: wachtwoord

---

## Bestandsstructuur

```
hustlefit/

Fotos/                  # Alle afbeeldingen (productfoto's, logo's, banners)
Furkan NEXUS/           # Screenshots en video uitleg van mijn bijdrage aan de project
lemonmilk/              # Custom fonts (LEMONMILK)
Week 1 t/m Week 6       # Scrumboards, Sprint Retrospectives, Sprint reviews, standup meetings
accessoires.css
accessoires.js
accessoires.php         # Accessoires pagina
authentication.php      # Verwerkt login, registratie, logout
dames.css
dames.html              # Dames pagina (statisch)
dames.js
db_connection.php       # Hoofd databaseconnectie
kids.html               # Kids pagina (statisch)
login.php               # Inlogformulier
Netux.css               # Hoofd stylesheet (door mij)
Netux.html              # Homepagina (door mij)
Netux.js                # JavaScript voor homepagina (door mij)
Netux_herenpagina.php   # Herenpagina met databasekoppeling (door mij)
nexus (1).sql           # Database export
profile.php             # Gebruikersprofiel
register.php            # Registratieformulier
sales.css
sales.html              # Salespagina (statisch)
sales.js                # (leeg)
```

---

## 👥 Team en bijdragen

Dit project is gemaakt door een team van vijf studenten in leerjaar 1. Hieronder staat wie waaraan heeft gewerkt en welke rollen we hebben verdeeld. Omdat we geen versiebeheer hebben gebruikt, is dit een achteraf overzicht van de bijdragen.

| Naam (anoniem) | Bijdrage |
|----------------|----------|
| **Ik**         | **Homepagina (`Netux.html`)** met bijbehorende **CSS (`Netux.css, netux_herenpagina.css`)** en **JavaScript (`Netux.js`)**. Ook de **heren-pagina (`Netux_herenpagina.php`)** met dynamische productweergave uit de database, wireframes gemaakt, databases voor producten gemaakt en scrumboard volledig gemaakt (scrum master). |
| Teamgenoot 1   | Accessoirespagina (`accessoires.php`, `accessoires.css`, `accessoires.js`), homepagina aangepast en wireframes gemaakt. |
| Teamgenoot 2   | Inlog/registratie systeem (`authentication.php`, `login.php`, `register.php`, `profile.php`, `db_connection.php`) |
| Teamgenoot 3   | Damespagina (`dames.html`, `dames.css`, `dames.js`), Sales pagina (`sales.html`, `sales.css`) en CRUD gemaakt van leveranciers |
| Teamgenoot 4   | Kinder pagina (`kids.html`) en databaseontwerp (`nexus.sql`) |

> **Opmerking:** Omdat we geen versiebeheer zoals Git hebben gebruikt, zijn de bijdragen achteraf geïnventariseerd. Sommige teamleden hebben ook meegeholpen met elkaars code (pair programming).

---

## Schermopname van de website

De video van de schermopname is te vinden via Github in de map `hustlefit`. Hierin laat ik zien hoe de website werkt, inclusief de homepagina, herenpagina met databaseproducten die ik gemaakt heb, en het inlog/registratiesysteem dat door een teamgenoot is gemaakt.

---

## Toekomstige verbeteringen

Het project is functioneel maar kan op een aantal punten worden verbeterd:

- **Consistente bestandsnamen**: Gebruik bijvoorbeeld `heren.php` in plaats van `Netux_herenpagina.php`.
- **Foutafhandeling**: Betere validatie en gebruikersvriendelijke foutmeldingen.
- **Winkelwagenfunctionaliteit**: Nu nog niet aanwezig; kan worden toegevoegd met sessies of database.
- **Zoekfunctie en filters**.
- **Admin-paneel** om producten te beheren.
- **Gebruik van een framework** zoals Laravel of Symfony voor gestructureerdere code.
- **Versiebeheer met Git** vanaf het begin.

---

## 📄 Licentie

Dit project is gemaakt voor educatieve doeleinden. Je mag het vrij gebruiken, aanpassen en distribueren, maar vermeld wel de oorspronkelijke auteurs. Voor commercieel gebruik is toestemming nodig.

---

