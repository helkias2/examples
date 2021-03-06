<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

//The first round of flipswitch should not run any functions because the library has
//yet to be loaded
echo '<h1>Test 1</h1>';
flipSwitch();

//Initialize the library, add the library that is currently in the PV_LIBRARIES
//define location but only allow calles to be included with the extension
//.class.php. The first arguement is the folder name.
Libraries::init();
Libraries::addLibrary('pv_switch', array('extensions' => array('.class.php')));
Libraries::loadLibraries();

echo '<h1>Test 2</h1>';
flipSwitch();

//Add the same library except leave the extension blank to allow every
//extension with .php to load
Libraries::addLibrary('pv_switch');
Libraries::loadLibrary('pv_switch');

echo '<h1>Test 3</h1>';
flipSwitch();

/**
 * Flip switch is our function for testing if a class in a library  is available,
 * and if so, to execute a functions on and of. As we load the libraries, this classes
 * will become accessible
 */
function flipSwitch() {

	if (class_exists('PowerSwitch')) {
		echo '<h3>PowerSwitch</h3>';
		PowerSwitch::on();
		PowerSwitch::off();
	} else {
		echo '<p><strong>Class "PowerSwitch" Not Found</strong></p>';
	}

	if (class_exists('Fuse')) {
		echo '<h3>Fuse</h3>';
		Fuse::on();
		Fuse::off();
	} else {
		echo '<p><strong>Class "Fuse" Not Found</strong></p>';
	}

	if (class_exists('PowerPlant')) {
		echo '<h3>PowerPlant</h3>';
		PowerPlant::on();
		PowerPlant::off();
	} else {
		echo '<p><strong>Class "PowerPlant" Not Found</strong></p>';
	}

}
