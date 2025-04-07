<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Leverancier</title>
</head>
<body>
<form method="post"  action="">
    <h1>Crud Leverancier</h1>
    <br><br>
    <label for="naam">Naam: </label>
    <input type="text" name="naam" id="naam" required>
    <br>
    <label for="land">Land: </label>
    <input type="text" name="land" id="land" required>
    <br>
    <label for="omschrijving">Omschrijving: </label>
    <input type="text" name="omschrijving" id="omschrijving" required>
    <br>
    <button type="submit" value="insert" name="send">Insert</button>
    <br><br><br><br>

    <a href='crud_leverancier.php'>Home</a>
</form>
<?php 

//var_dump($_POST);

echo "<br>";

require_once('functions_leverancier.php');

// Test of er op de insert-knop is gedrukt
if(isset($_POST) && isset($_POST['omschrijving'])) {

    InsertLeverancier($_POST);
    echo '<script>alert("Leverancier naam: ' . $_POST['naam'] .' is toegevoegd")</script>';
    //echo "<script> location.replace('crud_leverancier.php'); </script>";
}

function InsertLeverancier($post) {
    //var_dump($post);
    //echo "dit is de funtie InsertLeverancier<br>";

    try {
        $conn = ConnectDb();

        $query = $conn->prepare("
        INSERT INTO leverancier (naam, land, omschrijving)
        VALUES (:naam, :land, :omschrijving)");

        //oplossing 2
        $query->execute([
            ':naam' => $post['naam'],
            ':land' => $post['land'],
            ':omschrijving' => $post['omschrijving']
        ]);

    } catch (PDOException $e) {
        echo "Insert failed: " . $e->getMessage();
    }
}
?>
</body>
</html>