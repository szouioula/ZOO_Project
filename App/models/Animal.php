<?php

class Animal{

use Parametres;
use Animal_trait;

    private $id;
    private $name;
    private $age;
    private $species; 
    private $entryDate;
    private $gender;
    private $parent_id;
    private $picture;
    private $diet;
    private $treatment;
    private $deathDate;
    private $info;
    private $enclos_id;


    public function __construct(){}


    private $animals;//tableau d'animaux


    
}