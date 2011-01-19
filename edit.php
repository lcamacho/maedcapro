<?php
include_once 'autoload.php';

$persona = Persona::getByCi($_GET['ci']);

include 'views/new.php';