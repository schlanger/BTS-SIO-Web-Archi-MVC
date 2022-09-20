<?php

namespace Quizz\Controller;

use Quizz\Core\View\TwigCore;
use Quizz\Entity\Etudiant;
use Quizz\Model\EtudiantModel;

class UpdateController implements \Quizz\Core\Controller\ControllerInterface
{
    private $id;
    //private $post;

    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
        var_dump($tabInput["VARS"]["id"]);
        if (isset($tabInput["VARS"]["id"])) {
            $this->id = $tabInput["VARS"]["id"];
            //$this->post = $tabInput["POST"];
        }
    }

    public function outputEvent()
    {
        // TODO: Implement outputEvent() method.
        $EtudiantModel = new EtudiantModel();

        if (isset($this->id)) {
        //$Etudiant = new Etudiant();


        //return TwigCore::getEnvironment()->render('etudiant/etudiant.html.twig');
            /*
             $Etudiant->setLogin($this->post['pseudo']);
             $Etudiant->setMotDePasse($this->post['Password']);
             $Etudiant->setNom($this->post['lastname']);
             $Etudiant->setPrenom($this->post['Firstname']);
             $Etudiant->setEmail($this->post['Email']);
            */

             return TwigCore::getEnvironment()->render('etudiant/Update.html.twig',[
                 'etudiant'=>$EtudiantModel->getFetchId((int) $this->id),
                 'update'=>$EtudiantModel->UpdateEtudiant((int) $this->id)
                 ]);
        }else{
            return null;
        }


    }
}






