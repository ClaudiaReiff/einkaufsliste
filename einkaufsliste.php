<?php

//Includes
include './classes/dbh.class.php';
include './classes/einkaufsliste.class.php';
include './classes/einkaufsliste-contr.class.php';

//Instantiate & get all lists
$einkaufsliste = new EinkaufslisteController();
$options = $einkaufsliste->getAll();
$products = [];

//Get products for selected list
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $selectedList = $_POST['liste'];
    $products = $einkaufsliste->getProducts($selectedList);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Einkaufsliste</h4>
    <form action="" method="post">
        <div style="display:flex;">
            <div style="margin-right:10px;">
                <select name="liste" id="liste">
                    <?php
                    foreach($options as $option){
                        echo "<option value='{$option['id']}'>{$option['bezeichnung']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <button type="submit">Anzeigen</button>
            </div>
        </div>
    </form>

    <?php if($products){ ?>

    <table>
        <tr>
            <td>Gekauft</td>
            <td>Produkt</td>
            <td>Menge</td>
            <td>Shop</td>
            <td>Kategorie</td>
        </tr>

        <?php
        foreach($products as $product){
            echo "<tr><td>" . $product["gekauft"] . "</td>";
            echo "<td>" . $product["produkt"] . "</td>";
            echo "<td>" . $product["menge"] . "</td>";
            echo "<td>" . $product["shop"] . "</td>";
            echo "<td>" . $product["kategorie"] . "</td></tr>";
        }
        ?>
    </table>

    <?php }?>

    <br>

    <form action="./inc/product.inc.php" method="post">
        <button type="submit">Produkt hinzufügen</button>
    </form>

</body>
</html>