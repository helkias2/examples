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

//Set a few session arguements and initialize the session
$session_args = array('session_lifetime' => 3000, 'cookie_lifetime' => 3000, );
Session::init($session_args);

//Data to encrypt
$cookie_name = 'Test_Cookie';
$cookie_data = 'Test Cookie Data';
$cookie_array_name = 'Test_Cookie_Array';
$cookie_array_data = array('abc', 123, 'doe', 'rae', 'mee');

$session_name = 'Test Session';
$session_data = 'Test Session Data';
$session_array_name = 'Session_Cookie_Array';
$session_array_data = array('abc', 123, 'doe', 'rae', 'mee');

Session::writeCookie($cookie_name, $cookie_data);
echo '<p>Unhashed Cookie Accessed Directly: ' . $_COOKIE[$cookie_name] . '</p>';
echo '<p>Unhashed Cookie Accessed through readCookie: ' . Session::readCookie($cookie_name) . '</p>';

Session::deleteCookie($cookie_name);
echo '<p>Cookie Deleted... ' . Session::readCookie($cookie_name) . '</p>';
echo '<hr />';

Session::writeCookie($cookie_array_name, $cookie_array_data);
echo '<p>Unhashed Array Cookie Accessed Directly: ' . $_COOKIE[$cookie_array_name] . '</p>';
echo '<p>Unhashed ArrayCookie Accessed through readCookie: ' . Session::readCookie($cookie_array_name) . '</p>';

Session::deleteCookie($cookie_array_name);
echo '<p>Cookie Deleted... ' . Session::readCookie($cookie_array_name) . '</p>';
echo '<hr />';

$options = array('hash_cookie' => true);
Session::writeCookie($cookie_name, $cookie_data, $options);
echo '<p>Hashed Cookie Accessed Directly: ' . @$_COOKIE[$cookie_name] . '</p>';
echo '<p>Hashed Cookie Accessed through readCookie: ' . Session::readCookie($cookie_name, $options) . '</p>';

Session::deleteCookie($cookie_name, $options);
echo '<p>Cookie Deleted... ' . Session::readCookie($cookie_name, $options) . '</p>';
echo '<hr />';

Session::writeSession($session_name, $session_data);
echo '<p>Unhashed Cookie Accessed Directly: ' . $_SESSION[$session_name] . '</p>';
echo '<p>Unhashed Cookie Accessed through readSession: ' . Session::readSession($session_name) . '</p>';

Session::deleteSession($session_name);
echo '<p>Session Deleted... ' . Session::readSession($session_name) . '</p>';
echo '<hr />';

Session::writeSession($session_array_name, $session_array_data);
echo '<p>Unhashed Array Session Accessed Directly: ' . $_SESSION[$session_array_name] . '</p>';
echo '<p>Unhashed Array Session Accessed through readSession: ' . Session::readSession($session_array_name) . '</p>';

Session::deleteSession($session_array_name);
echo '<p> Session Deleted... ' . Session::readSession($session_array_name) . '</p>';
echo '<hr />';

$options = array('hash_session' => true);
Session::writeSession($session_name, $session_data, $options);
echo '<p>Hashed Session Accessed Directly: ' . @$_SESSION[$session_name] . '</p>';
echo '<p>Hashed Session Accessed through readSession: ' . Session::readSession($session_name, $options) . '</p>';

Session::deleteSession($session_name, $options);
echo '<p>Session Deleted... ' . Session::readSession($session_name, $options) . '</p>';
echo '<hr />';

print_r($_COOKIE);
