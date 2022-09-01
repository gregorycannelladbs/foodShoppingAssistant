<?php
include_once 'models/BaseFunctions.php';

Class Controller {

    public static function indexController(){
        $recipes = BaseFunctions::getRecipes();
        include 'views/index.php';
    }

    public static function recipeController(){
        $recipeId = $_POST['recipeId'];
        $recipe = $_POST['recipe'];
        $type = $_POST['type'];
        $numberOfPeople = $_POST['numberOfPeople'];
        $isNumberOfPeopleModifiable = $_POST['isNumberOfPeopleModifiable'];

        $ingredients = BaseFunctions::getIngredients($recipeId);

        $instructions = BaseFunctions::getInstructions($recipeId);

        require 'views/recipe.php';
    }

    public static function shoppingListController(){
        $data = BaseFunctions::cleanData($_POST['data']);

        $shoppingList = BaseFunctions::getShoppingList($data);

        require 'views/shoppingList.php';
    }
}