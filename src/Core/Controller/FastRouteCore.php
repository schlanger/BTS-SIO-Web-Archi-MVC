<?php

namespace Quizz\Core\Controller;

use FastRoute\Dispatcher;
use Quizz\Controller\Error\HttpController;

class FastRouteCore
{
    public static function getDispatcher($dispatcher) {

        // Fetch method and URI from somewhere
        //on récupère la methode HTTP
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        //on crée l'URL de la route par défaut
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        //si il n'y'a pas de variables dans l'URL
        if (false !== $pos = strpos($uri, '?')) {
            //sa permet de determiner des linmites pour aller déterminer entre les chaines de caractère
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        //on recupere la route dans l'URL
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        //var_dump($routeInfo);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                $httpController = new HttpController();
                return $httpController->outputEvent();
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // TODO mettre les erreurs
                // ... 405 Method Not Allowed
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                //
                $exeController = new $handler(); // -> Creation du controller correspondant à la demande
                $exeController->inputRequest(["GET" => $_GET, "POST" => $_POST, "VARS" => $routeInfo[2]]);
                return $exeController->outputEvent();
        }
    }
}