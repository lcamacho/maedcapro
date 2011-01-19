<?php
include 'autoload.php';

$personas = Persona::getAll();

include 'views/index.php';