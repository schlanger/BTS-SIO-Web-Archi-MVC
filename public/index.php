<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Quizz\Core\Controller\FastRouteCore;

// Gestion des fichiers environnement
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Couche Controller
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/', 'Quizz\Controller\HomeController');
    $route->addRoute('GET', '/lister', 'Quizz\Controller\Questionnaire\ListController');
    $route->addRoute('GET', '/detail/{id:\d+}', 'Quizz\Controller\Questionnaire\ViewController');
    $route->addRoute('GET','/prenom={prenom:\w+}', 'Quizz\Controller\PrenomController');
    $route->addRoute(['GET','POST'],'/etudiant/add','Quizz\Controller\EtudiantController');
    $route->addRoute(['GET', 'POST'], '/etudiant', 'Quizz\Controller\ListEtudiantController');
    $route->addRoute(['GET','POST'] , '/etudiant/{id:\d+}' , 'Quizz\Controller\UpdateController');
    $route->addRoute(['GET','POST'] ,'/etudiant/{id:\d+}/del' , 'Quizz\Controller\DeleteController');
});
// Dispatcher -> Couche view
echo FastRouteCore::getDispatcher($dispatcher);

