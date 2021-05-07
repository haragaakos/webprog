<?php

$ceg = 'Systema Budapest';

$ablakcim = array(
    'cim' => $ceg,
);

$fejlec = array(
    'kepforras' => 'logo.jpg',
    'kepalt' => 'logo',
	'cim' => $ceg,
	'motto' => ''
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => $ceg . "."
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => $ceg, 'menun' => array(1,1)),
	'https://budapestsystema.hu/' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0))
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>