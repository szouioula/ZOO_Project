<?php

trait Parametres{

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getEntryDate(){return $this->entryDate;}
    public function setEntryDate($entryDate){$this->entryDate = $entryDate;}

    public function getGender(){return $this->gender;}
    public function setGender($gender){$this->gender = $gender;}

    public function getPicture(){return $this->picture;}
    public function setPicture($picture){$this->picture = $picture;}

    public function getInfo(){return $this->info;}
    public function setInfo($info){$this->info = $info;}


}