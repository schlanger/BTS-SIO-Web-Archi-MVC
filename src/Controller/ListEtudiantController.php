<?php

namespace Quizz\Controller;

use Quizz\Model\EtudiantModel;
use Quizz\Service\TwigService;

class ListEtudiantController implements \Quizz\Core\Controller\ControllerInterface
{

    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.s

    }

    public function outputEvent()
    {
        // TODO: Implement outputEvent() method.
        $user = new EtudiantModel();
        $tabUser = $user->getFetchAll();
        $twig = TwigService::getEnvironment();

        if(isset($_GET['idUser'])){
            echo $twig->render('etudiant/listEtudiant.html.twig',[
                'voir_user'=> true,
                'user' => $user->getFetchId((int)$_GET['idUser']),

            ]);
        }
        else {


            echo $twig->render('etudiant/listEtudiant.html.twig', [
                'Utilisateur' => $tabUser,

            ]);
        }

    }
}