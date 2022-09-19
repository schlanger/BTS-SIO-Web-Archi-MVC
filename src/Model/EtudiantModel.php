<?php

namespace Quizz\Model;
use Quizz\Core\Service\DatabaseService;
use Quizz\Entity\Etudiant;


class EtudiantModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DatabaseService::getConnect();
    }
    public function getFetchAll()
    {
        $requete = $this->bdd->prepare("SELECT idEtudiant,login,email FROM etudiants");
        $requete->execute();
        foreach ($requete->fetchAll() as $value) {
            $user = new Etudiant();
            $user->setIdEtudiant($value['idEtudiant']);
            $user->setLogin($value['login']);
            $user->setEmail($value['email']);
            $tabUsers[] = $user;
        }
        return $tabUsers;
    }
    public function getFetchId(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM etudiants WHERE idEtudiant = {$id}");
        $requete->execute();
        $result = $requete->fetch();
        $user = new Etudiant();
        $user->setIdEtudiant($result['idEtudiant']);
        $user->setLogin($result['login']);
        $user->setEmail($result['email']);
        return $user;

    }
    public function delEtudiant(int $id)
    {
        $request = "DELETE FROM etudiants WHERE idEtudiant = {$id}";
        $result = $this->bdd->prepare($request);
        $result->execute();
    }
    public function  addEtudiant($login,$motDePasse,$nom,$prenom,$email){
        $request= $this->bdd->prepare("insert into etudiants(login,motDePasse,nom,prenom,email)values('{$login}','{$motDePasse}','{$nom}','{$prenom}','{$email}')")->execute();
    }
    public function UpdateEtudiant(int $id){
        $login =$_POST['pseudo'];
        $motDePasse =password_hash($_POST['Password'],PASSWORD_DEFAULT);
        $nom =$_POST['lastname'];
        $prenom =$_POST['Firstname'];
        $email =password_hash($_POST['Email'],PASSWORD_DEFAULT);
        $request ="Update etudiants  set login= '{$login}', motDePasse = '{$motDePasse}' , nom = '{$nom}', prenom = '{$prenom}' , email = '{$email}' where idEtudiant = {$id}";
        $result = $this->bdd->prepare($request);
        $result->execute();
    }

}