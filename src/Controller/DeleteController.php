<?php

namespace Quizz\Controller;

use Quizz\Model\EtudiantModel;
use Quizz\Service\TwigService;

class DeleteController implements \Quizz\Core\Controller\ControllerInterface
{
    private $id;
    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
        if (isset($tabInput["VARS"]["id"])) {
            $this->id = $tabInput["VARS"]["id"];
        }
    }

    public function outputEvent()
    {
        $EtudiantModel = new EtudiantModel();
        if (isset($this->id)) {
        // TODO: Implement outputEvent() method.
            $EtudiantModel->getFetchId((int) $this->id);
            $id=$_GET['id'];
            $EtudiantModel->delEtudiant($id);

    }
    }

}