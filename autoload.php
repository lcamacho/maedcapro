<?php
function __autoload($class)
{
	include './model/'.$class.'.php';
}