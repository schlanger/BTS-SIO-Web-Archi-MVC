<?php

namespace Quizz\Controller;
use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;

class PrenomController implements ControllerInterface
{
    private $prenom;

    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
        if (isset($tabInput["VARS"]["prenom"])) {
            $this->prenom = $tabInput["VARS"]["prenom"];
        }
    }


    public function outputEvent()
    {
        // TODO: Implement outputEvent() method.
        //var_dump("je suis la");
        $twig = TwigCore::getEnvironment();
        if(isset($this->prenom)) {
            var_dump( $this->prenom);
            return TwigCore::getEnvironment()->render('questionnaire/prenom.html.twig',
                [
                    'prenom' => $this->prenom
                ]);
        }else{
             return null;
        }



        }
}