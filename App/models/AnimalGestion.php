<?php
require_once "Model.Class.php";
require_once "Animal.php";

class AnimalGestion extends Model{
    private $animals;//tableau de animal

    public function ajoutAnimal($animal){
        $this->animals[] = $animal;
    }

    public function getAnimals(){
        return $this->animals;
    }

    protected function index(){
        $req = $this->getBdd()->prepare("SELECT * FROM animals");
        $req->execute();
        $mesanimals = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesanimals as $animal){
            $l = new animal($animal['id'],$animal['titre'],$animal['nbPages'],$animal['image']);
            $this->ajoutanimal($l);
        }
    }

    public function getAnimalById($id){
        for($i=0; $i < count($this->animals);$i++){
            if($this->animals[$i]->getId() === $id){
                return $this->animals[$i];
            }
        }
        throw new Exception("L'animal n'existe pas");
    }

    public function addAnimal($name,$gender,$age, $species, $entryDate, $parentID, $picture, $diet, $treatment, $deathDate, $infos, $enclos_id ){
        $req = "
        INSERT INTO animals (`animal_name`,`animal_species`,`animal_entryDate`,`animal_gender`,`animal_parent_id`,
        `animal_picture`,`animal_diet`,`animal_treatment`,`animal_deathDate`,`animal_info`,`animal_enclos_id` )
        values (:name, :species, :entryDate, :gender, :parentID, :picture, :diet, :treatment, :deathDate,
        :infos, :enclos_id)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":species",$species,PDO::PARAM_STR);
        $stmt->bindValue(":entryDate",$entryDate,PDO::PARAM_DATE);
        $stmt->bindValue(":gender",$gender,PDO::PARAM_STR_CHAR);
        $stmt->bindValue(":parent_ID",$parent_ID,PDO::PARAM_INT);
        $stmt->bindValue(":picture",$picture,PDO::PARAM_STR);
        $stmt->bindValue(":diet",$diet,PDO::PARAM_STR);
        $stmt->bindValue(":treatment",$treatment,PDO::PARAM_STR);
        $stmt->bindValue(":deathDate",$deathDate,PDO::PARAM_DATE);
        $stmt->bindValue(":infos",$infos,PDO::PARAM_STR);
        $stmt->bindValue(":enclos_id",$enclos_id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $animal = new animal($this->getBdd()->lastInsertId(),$name, $species, $entryDate, $gender, $parentID, $picture, $diet, $treatment, $deathDate,
            $infos, $enclos_id);
            $this->ajoutAnimal($animal);
        }        
    }

    public function deleteAnimalByID($id){
        $req = "
        Delete from animals where animal_id = :idAnimal
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idAnimal",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $animal = $this->getanimalById($id);
            unset($animal);
        }
    }

    public function updateAnimalByID($name,$gender,$age, $species, $entryDate, $parentID, $picture, $diet, $treatment, $deathDate, $infos, $enclos_id ){
        $req = "
        update animals 
        set `animal_name`= :name, `animal_species`= :species, `animal_entryDate`= :entryDate, `animal_gender`= :gender, `animal_parent_id`=:parentID,
        `animal_picture`= :picture, `animal_diet`=:diet, `animal_treatment`=:treatment, `animal_deathDate`=:deathDate,
        `animal_info`=:infos, `animal_enclos_id`= :enclos_id
        where animal_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":species",$species,PDO::PARAM_STR);
        $stmt->bindValue(":entryDate",$entryDate,PDO::PARAM_DATE);
        $stmt->bindValue(":gender",$gender,PDO::PARAM_STR_CHAR);
        $stmt->bindValue(":parent_ID",$parent_ID,PDO::PARAM_INT);
        $stmt->bindValue(":picture",$picture,PDO::PARAM_STR);
        $stmt->bindValue(":diet",$diet,PDO::PARAM_STR);
        $stmt->bindValue(":treatment",$treatment,PDO::PARAM_STR);
        $stmt->bindValue(":deathDate",$deathDate,PDO::PARAM_DATE);
        $stmt->bindValue(":infos",$infos,PDO::PARAM_STR);
        $stmt->bindValue(":enclos_id",$enclos_id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getanimalById($id)->setTitre($titre);
            $this->getanimalById($id)->setTitre($nbPages);
            $this->getanimalById($id)->setTitre($image);
        }
    }
}