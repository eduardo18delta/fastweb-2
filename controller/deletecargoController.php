<?php 

session_start();

require_once '../model/autoload.php';

$cargo = new Cargos();

$cargo->id = $_POST['id'];

$cargo->verificadelete();

