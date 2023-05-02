<?php

include('./Plane.php');

$plane = new Plane();
$plane->set_limitPassagers(215);
$plane-> set_name('Boeing 737');
$plane-> set_company('GOL');
$plane-> set_numPassengers(85);
echo $plane->concatProps();