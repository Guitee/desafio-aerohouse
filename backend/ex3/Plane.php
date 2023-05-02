<?php

class Plane {
    private $name;
    private $company;
    private $numPassengers;
    private $limitPassagers;

    function set_name($name) {
        $this->name = $name;
        echo'Nome: ' . $name;
    }

    function get_name() {
        return $this->name;
    }
    
    function set_company($company) {
        $this->company = $company;
    }

    function get_company() {
        return $this->company;
    }

    function set_numPassengers($numPassengers) {
        if($numPassengers <= $this->get_limitPassagers())
          $this->numPassengers = $numPassengers;
        else
          throw new \Exception('Esse avião suporta apenas 215 passagueiros');   
    }

    function get_numPassengers() {
        return $this->numPassengers;
    }

    function set_limitPassagers($limitPassagers) {
        $this->limitPassagers = $limitPassagers;
    }

    function get_limitPassagers() {
        return $this->limitPassagers;
    }

    public function concatProps() { 
        return $this->get_name() . '<br />' . 'Companhia: ' . $this->get_company() .
         '<br />' . 'Suporta ' . $this->get_numPassengers() . ' passageiros';
    }
    
}