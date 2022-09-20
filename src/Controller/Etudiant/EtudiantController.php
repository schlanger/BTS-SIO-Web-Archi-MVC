<?php

namespace Quizz\Controller;
use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;
use Quizz\Entity\Etudiant;
use Quizz\Model\EtudiantModel;

class EtudiantController implements ControllerInterface
{


    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
    }

    public function outputEvent()
    {
        // TODO: Implement outputEvent() method.
        //if (isset($_POST['validate'])) {
        $EtudiantModel = new EtudiantModel();
        $Etudiant= new Etudiant();
        $twig = TwigCore::getEnvironment();


        //return TwigCore::getEnvironment()->render('etudiant/etudiant.html.twig');



        echo TwigCore::getEnvironment()->render('etudiant/etudiant.html.twig');

        //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //if(isset($_POST['validate'])){

           //if (isset($_POST['pseudo'], $_POST['password'], $_POST['lastname'], $_POST['firstname'], $_POST['email'])) {
               //verifier si le user a bien complété les champs
               //if (!empty($_POST['pseudo']) and !empty($_POST['Password']) and !empty(['lastname']) and !empty(['Firstname']) and !empty(['Email'])) {
                   $user_login = htmlspecialchars($_POST['pseudo']);
                   $user_motdepasse = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                   $user_nom = htmlspecialchars($_POST['lastname']);
                   $user_prenom = htmlspecialchars($_POST['Firstname']);
                   $user_email =password_hash($_POST['Email'],PASSWORD_BCRYPT);


                   //$insertEtudiant = $EtudiantModel->addEtudiant($login, $motDePasse, $nom, $prenom, $email);


           //else{
           //die ("le formulaire est incomplet");

          //$EtudiantModel->addEtudiant($login, $motDePasse, $nom, $prenom, $email);
        /*
        $login =$_POST['pseudo'];
        $motDePasse =$_POST['Password'];
        $nom =$_POST['lastname'];
        $prenom =$_POST['Firstname'];
        $email =$_POST['Email'];
        */
        $EtudiantModel->addEtudiant($user_login,$user_motdepasse,$user_nom,$user_prenom,$user_email);
        //var_dump($_POST['Password']);


        }





}