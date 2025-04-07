<?php

    echo "<h1>Update Leverancier</h1>";
    require_once('functions_leverancier.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){
        UpdateLeverancier($_POST);

        //header("location: crud_leverancier.php");
    }

    if(isset($_GET['id'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        // SELECT * FROM leverancier WHERE id = $leverancier
        $row = GetLeverancier($id);
    
?>

<html>
    <body>
        <form method="post">
        <br>
        <input type="hidden" name="id" value="<?php echo $row['id'];?>"><br>
        Naam:<input type="" name="naam" value="<?php echo $row['naam'];?>"><br> 
        Land: <input type="text" name="land" value="<?= $row['land']?>"><br>
        Omschrijving: <input type="text" name="omschrijving" value="<?= $row['omschrijving']?>"><br>
        <?php
            // dropDownBrouwer('brouwcode', $row['brouwcode'] );
        ?>

        <br>
         <input type="submit" name="btn_wzg" value="Wijzigen"><br>
        </form>
        <br><br>
        <a href='crud_leverancier.php'>Home</a>
    </body>
</html>

<?php
    } else {
        "Geen id opgegeven<br>";
    }
?>