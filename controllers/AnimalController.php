<?php
require_once "App/models/Animal.php";

class AnimalController extends Controller{
    private $animalGestion;

    public function __construct(){
        $this->animalGestion = new animalGestion;
        $this->animalGestion->index();
    }

    public function afficheranimals(){
        $animals = $this->animalGestion->getanimals();
        require "views/animals.view.php";
    }

    public function afficherAnimal($id){
        $animal = $this->animalGestion->getAnimalById($id);
        require "views/afficherAnimal.view.php";
    }

    public function addAnimal(){
        require "views/ajoutAnimal.view.php";
    }

    public function ajoutAnimalValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/animal/";
        $nomImageAjoute = $this->ajoutImage($file,$repertoire);
        $this->animalGestion->addAnimalById($_POST['gender'], $_POST['age'],  $_POST['species'],  $_POST['entryDate'],  $_POST['parentID'],  $nomImageAjoute, $_POST['name'],  $_POST['diet'],  $_POST['treatment'],  $_POST['deathDate'],  $_POST['infos'],  $_POST['enclos_id']);
        
        $_SESSION['alert'] = [
            "type" => "success", 
            "msg" => "Ajout Réalisé"
        ];
        
        header('Location: '. URL . "animals");
    }

    public function suppressionAnimal($id){
        $nomImage = $this->animalGestion->getAnimalById($id)->getImage();
        unlink("public/images/animal/".$nomImage);
        $this->animalGestion->deleteAnimalByID($id);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression Réalisée"
        ];
        header('Location: '. URL . "animals");
    }

    public function modificationAnimal($id){
        $animal = $this->animalGestion->getAnimalById($id);
        require "views/modifierAnimal.view.php";
    }

    public function modificationAnimalValidation(){
        $imageActuelle = $this->animalGestion->getanimalById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];

        if($file['size'] > 0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->animalGestion->updateAnimalByID($_POST['gender'], $_POST['age'],  $_POST['species'],  $_POST['entryDate'],  $_POST['parentID'],  $nomImageToAdd, $_POST['name'],  $_POST['diet'],  $_POST['treatment'],  $_POST['deathDate'],  $_POST['infos'],  $_POST['enclos_id']);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "modification Réalisée"
        ];
        
        header('Location: '. URL . "animals");
    }

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }




}