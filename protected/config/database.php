<?php

// This is the database connection configuration.
// This is the database connection configuration.
$username = "root";
	$password = "";
	$database = "palito";
if($_SERVER['HTTP_HOST']=="localhost")
{
	$username = "root";
	$password = "";
	$database = "palito";
}

return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=localhost;dbname='.$database,
	'emulatePrepare' => true,
	'username' => $username,
	'password' => $password,
	'charset' => 'utf8',
);