<?php

require_once('person.abstract.php');

class ErnestZakrzewski extends Person
{
	protected $firstName = 'Ernest';
	protected $lastName = 'Zakrzewski';
}

$ernest = new ErnestZakrzewski;
echo $ernest->getFirstName();
echo ' ';
echo $ernest->getLastName();