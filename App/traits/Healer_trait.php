<?php


trait Healer_trait{

    public function getFirstName(){return $this->first_name;}
    public function setFirstName($first_name){$this->first_name = $first_name;}

    public function getLastName(){return $this->last_name;}
    public function setLastName($last_name){$this->last_name = $last_name;}

    public function getPhone(){return $this->phone;}
    public function setPhone($phone){$this->phone = $phone;}

    public function getNombreEnclosMax(){return $this->nb_enclos_max;}
    public function setNombreEnclosMax($nb_enclos_max){$this->nb_enclos_max = $nb_enclos_max;}

    public function getIdSupperior(){return $this->id_sup;}
    public function setIdSupperior($id_sup){$this->id_sup = $id_sup;} 

    public function getCheckoutDate(){return $this->checkout_date;}
    public function setCheckoutDate($checkout_date){$this->checkout_date = $checkout_date;}
}