<?php
include_once 'autoload.php';

Persona::delete($_GET['ci']);

header('Location:index.php');