<?php
include_once 'controller/Controller.php';

class Router{
    public function resolve(string $uri): mixed{
        $path = explode('?', $uri)[0];

        if ($path == '/') return Controller::indexController();
        
        if ($path == '/recipe') return Controller::recipeController();

        if ($path == '/shoppingList') return Controller::shoppingListController();

        return Controller::indexController();
    }
}