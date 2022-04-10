<?php


trait Animal_trait{
    
    public function getName(){return $this->name;}
    public function setName($name){$this->name = $name;}

    public function getAge(){return $this->age;}
    public function setAge($age){$this->age = $age;}

    public function getSpecies(){return $this->species;}
    public function setSpecies($species){$this->species = $species;}

    public function getParentId(){return $this->parent_id;}
    public function setParentId($parent_id){$this->parent_id = $parent_id;}

    public function getDiet(){return $this->diet;}
    public function setDiet($diet){$this->diet = $diet;}

    public function getTreatment(){return $this->treatment;}
    public function setTreatment($treatment){$this->treatment = $treatment;}

    public function getDeathDate(){return $this->deathdate;}
    public function setDeathDate($deathdate){$this->deathdate = $deathdate;}

    public function getEnclosId(){return $this->enclos_id;}
    public function setEnclosId($enclos_id){$this->enclos_id = $enclos_id;}
}