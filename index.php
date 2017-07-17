<?php
use Alanska\Controleur\Routeur;

session_start();
require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

