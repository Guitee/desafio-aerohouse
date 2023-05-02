<?php

require_once '.../ex3/index.php';
use PHPUnit\Framework\TestCase;

class TestPlane extends TestCase { 
    public function testSetGetName() {
        $plane = new Plane();
        $plane->set_name('Boeing 737');
        $this->assertEquals('Boeing 737', $plane->get_name());
    }
    
    public function testSetGetCompany() {
        $plane = new Plane();
        $plane->set_company('Gol');
        $this->assertEquals('Gol', $plane->get_company());
    }
    
    public function testSetGetNumPassengers() {
        $plane = new Plane();
        $plane->set_limitPassagers(215);
        $plane->set_numPassengers(200);
        $this->assertEquals(200, $plane->get_numPassengers());
    }
    
    public function testSetGetLimitPassagers() {
        $plane = new Plane();
        $plane->set_limitPassagers(215);
        $this->assertEquals(215, $plane->get_limitPassagers());
    }
    
}