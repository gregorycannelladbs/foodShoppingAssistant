<!DOCTYPE html>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //header("Expires: 0");
?>

<script src="js/index.js?v=6"></script>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/partials/topNavWithSearch.css?v=2">
        <link rel="stylesheet" href="css/index.css?v=2">
        <title>Food shopping assistant</title>
        <meta name="description" content="Food shopping assistant">
    </head>
    <body onpageshow="showSubmitButton()">
        <?php require 'partials/topNavWithSearch.php' ?>
        <main>
            <?php 
                $i = 0;
                echo"
                <form method='post' id='shoppingList' action='/shoppingList'></form>";
                foreach($recipes as $row) {
                    $recipeId = $row['recipe_id'];
                    $recipe = $row['recipe'];
                    $type = $row['type'];
                    $numberOfPeople = $row['number_of_people'];
                    $isNumberOfPeopleModifiable = $row['is_number_of_people_modifiable'];
                    
                    echo "
                    <form method='post' id=$recipeId action='/recipe'>
                        <input type='hidden' name='recipe' value='$recipe' form=$recipeId >
                        <input type='hidden' name='recipeId' value='$recipeId' form=$recipeId >
                        <input type='hidden' name='type' value='$type' form=$recipeId >
                        <input type='hidden' name='numberOfPeople' value='$numberOfPeople' form=$recipeId >
                        <input type='hidden' name='isNumberOfPeopleModifiable' value='$isNumberOfPeopleModifiable' form=$recipeId >
                    </form>
                    <div class='container'>
                        <div class='image'>
                            <input type='image' src='thumbnails/$recipeId.jpg?v=1' alt='$recipe' form=$recipeId >
                        </div>
                        <div class='description'>
                        <label for='checkbox.$recipeId'>
                                <button type='submit' class='recipeNameButton' id='recipeNameButton.$recipeId' form=$recipeId>";
                                if ($type == "cookéo"){
                                    echo "$recipe <b>(recette $type)</b></button>";
                                } else {
                                    echo "$recipe </button>";
                                }
                        echo"
                            </label>
                        </div>
                        <input type='checkbox' id='checkbox.$recipeId' name='data[$i][recipeId]' onclick='showSubmitButton()' value=$recipeId form='shoppingList'>
                        <select class= 'modifiedNumberOfPeople' name='data[$i][modifiedNumberOfPeople]' form='shoppingList'>
                            <option value='Nombre'>Nombre</option>";
                        if (!$isNumberOfPeopleModifiable) {
                            echo "<option value=$numberOfPeople>$numberOfPeople</option>";
                        }
                        if ($isNumberOfPeopleModifiable) {
                            echo "<option value=2>2</option>
                            <option value=4>4</option>
                            <option value=6>6</option>";
                        }
                        if ($type != "cookéo" && $isNumberOfPeopleModifiable) {
                            echo "
                            <option value=8>8</option>";
                        }
                        echo "
                        </select>
                        <input type='hidden' name='data[$i][recipe]' value='$recipe' form='shoppingList'>
                    </div>";

                    $i = $i+1;
                }
                echo "<input type='submit' id='submitButton' value='Voir ma liste de courses' form='shoppingList'>";
            ?>
        </main>
    </body>
</html>