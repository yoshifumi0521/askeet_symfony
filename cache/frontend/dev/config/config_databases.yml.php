<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2013/06/20 03:11:50

$database = new sfPropelDatabase();
$database->initialize(array (
  'phptype' => 'mysql',
  'host' => 'localhost',
  'database' => 'askeet',
  'username' => 'root',
  'password' => 'root',
), 'propel');
$this->databases['propel'] = $database;
