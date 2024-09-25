<?php
//Includes
include './classes/dbh.class.php';
include './classes/product.class.php';
include './classes/product-contr.class.php';

//Instantiate
$product = new ProductController();
$shops = $product->getShops();
$categories = $product->getCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkt</title>
</head>
<body>
    <h4>Produkt hinzufügen</h4>
    <p>Füge ein Produkt zur Einkaufsliste hinzu.</p>

    <form action="inc/product.inc.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Produktname">
        <br><br>
        <label for="notiz">Anmerkung:</label>
        <input type="text" name="notiz" id="notiz" placeholder="Anmerkung">
        <br><br>
        <label for="menge">Menge:</label>
        <input type="number" name="menge" id="menge" placeholder="Menge">
        <br><br>

        <label for="shop">Shop:</label>
        <select name="shop" id="shop">
            <?php
            foreach($shops as $shop){
                echo "<option value='{$shop['id']}'>{$shop['bezeichnung']}</option>";
            }
            ?>
        </select>

        <br><br>
        <label for="category">Kategorien:</label>
        <select name="category" id="category">
        <?php
            foreach($categories as $category){
                echo "<option value='{$category['id']}'>{$category['bezeichnung']}</option>";
            }
            ?>
        </select>

        <br><br>
        <button type="submit">Hinzufügen</button>

    </form>
</body>
</html>