<!DOCTYPE html>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Liste de courses">
        <link rel="stylesheet" href="css/partials/topNav.css?v=2">
        <link rel="stylesheet" href="css/shoppingList.css?v=12">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=block">
        <script src="js/shoppingList.js?v=3"></script>
        <title>Ma liste de courses</title>
    </head>
    <body>
        <?php require 'partials/topNav.php' ?>
        <main>
            <div class='recipeList'>
                <h2>Mes recettes</h2>
                <ul>
                    <?php
                        foreach($data as $assoc_array){
                            echo "<li>".$assoc_array['recipe']." <b>(".$assoc_array['modifiedNumberOfPeople']." personnes)</b></li>";
                        }
                    ?>
                </ul>
            </div>
            <img src='images/trolley.png' id='trolley'>
            <div class='shoppingList'>
                <h2>Ma liste de courses</h2>
                <table id= 'shoppingListTable'>
                    <thead>
                        <tr>
                            <th>ingrédient</th>
                            <th>quantité</th>
                            <th>unité</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($shoppingList as $row) {
                                echo "
                                    <tr>
                                        <td>".$row["ingredient"]."</td>
                                        <td>".round($row["quantity"], 2)."</td>
                                        <td>".$row["unit"]."</td>
                                        <td>
                                            <button id='deleteButton' onclick='deleteRow(this)'>
                                                <span class='material-symbols-outlined'>delete</span>
                                            </button>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <img src='images/check_mark.png' id='checkMark'>
        </main>
    </body>
</html>