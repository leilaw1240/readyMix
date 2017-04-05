<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* $database = 'scribeqc_student';
  $host = 'localhost';
  $username = 'scribeqc_student';
  $password = 'student@123';
 */



$database = 'readyMix';
$host = 'localhost';
$username = 'root';
$password = 'password';

if ($_SERVER['HTTP_HOST'] != 'localhost') {
    //define Live Credentials here...
    $database = '';
    $host = '';
    $username = '';
    $password = '';
}

return array(
    'connectionString' => 'mysql:host=' . $host . ';dbname=' . $database . '',
    'emulatePrepare' => true,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
    'tablePrefix' => 'tbl_',
);
