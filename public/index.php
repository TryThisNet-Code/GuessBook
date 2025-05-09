<?php
    require_once __DIR__ . '/../src/controller/GuestController.php';

    $controller = new GuestController();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $controller->addGuess();
    }else{
        $controller->showGuest();
    }
?>