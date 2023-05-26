<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request){
    case '/edsa-projet/' :
        require __DIR__ . '/Choix.html';
        break;
}
?>