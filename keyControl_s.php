<?php
define('KEY_F','keys/');

$name = $_GET['name'];
$thisDate = date('d.m.Y');
$thisTime = date('H:i:s');
$action = $_GET['action'];

if (!$name) {
	die('Enter a key name!');
}
if (!$action) {
	die('What do you want to do with keys?!');
}
if (!preg_match('/^[A-z0-9]{4,22}$/', $name) or !preg_match('/^[A-z0-9]{4,22}$/', $action)) {
	die('Incorrect name or action!');
}

$pathToKey = KEY_F . $name . '.key';

switch ($action) {

	case 'add':
		if (file_exists($pathToKey)) {
			die('Error: ' . 1);
		}

		file_put_contents($pathToKey, $name);
		die('Success!');
	break;

	case 'delete':
		if (!file_exists($pathToKey)) {
			die('Error: ' . 2);
		}

		unlink($pathToKey);
		if (!file_exists($pathToKey)) {
            die('Success!');
        }
        die('Failed to delete key!');
	break;

	case 'verify':
		if (!file_exists($pathToKey)) {
			die('Error: ' . 2);
		}

		die('Success!');
	break;

	default;
		die('Action not exists!');
	break;

}
?>