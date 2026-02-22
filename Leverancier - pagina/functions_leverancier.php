<?php 
// auteur: Vitaliy Ivanov
// functie: algemene functies tbv hergebruik
function ConnectDb(){
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project3";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Connected successfully";
        return $conn;
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 
 }

function CrudLeverancier() {
    // Menu item --- insert
    $txt = "
    <h1>Crud Leverancier</h1>
    <nav>
        <a href='insert_leverancier.php'>Toevoegen een nieuw leverancier</a>
    </nav>";
    echo $txt;

    // Haal alle leverancieren records uit de tabel
    $result = GetData("leverancier");

    // Print table
    PrintCrudLeverancier($result);
}



// seelcteer de data uit de opgeven table
function GetData($table) {
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    //var_dump($result);
    return $result;
}


// selecteer de rij van de opgeven id uit de table leverancier
function GetLeverancier($id){
    // Connect database
    $conn = ConnectDb();
 
    // Select data uit de opgegeven table methode prepare
 
    $query = $conn->prepare("SELECT * FROM leverancier WHERE id = :id");
    $query->execute([':id'=>$id]);
    $result = $query->fetch();
 
    return $result;
 
 }


// Haal alle leverancier record uit de tabel
$result = GetData("leverancier");

function PrintCrudLeverancier($result) {

    $table = "<table border = 1px>";

    // Print header table
    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr bgcolor=gray>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";  
    }

    $table .= "<th>wijzigen</th>";
    $table .= "<th>verwijderen</th>";
    $table .= "</tr>";

    
    // Print elke rij
    foreach ($result as $row) {

        $table .= "<tr>";
        // Print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }

        // twee extra colommen
        $table .= "<td>
            <form method='post' action='update_leverancier.php?id=$row[id]' >      
                <button name='wzg'>Wijzigen</button>    
            </form>
         </td>";

        $table .= "<td>
            <form method='post' action='delete_leverancier.php?id=$row[id]' >      
                <button name='wzg'>Verwijderen</button>    
            </form>
        </td>";

        $table .= "</tr>";
    }

    $table .= "</table>";
        
    echo $table;
}


function UpdateLeverancier($row) {

    try {
        // Connect database
        $conn = ConnectDb();

        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE leverancier
        SET
            naam = '$row[naam]',
            land = '$row[land]',
            omschrijving = '$row[omschrijving]'
        WHERE id = $row[id]";

        $query = $conn->prepare($sql);
        $query->execute();
    }

    catch(PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
}


function DeleteLeverancier($id) {
    echo "Delete row!";

    try {
        $conn = ConnectDb();

        $query = $conn->prepare("
        DELETE FROM leverancier WHERE leverancier.id = '$id'");

        // uitvoer prepare
        $query->execute();

    } catch (PDOException $e) {
        echo "Delete failed: " . $e->getMessage();
    }
}


?>