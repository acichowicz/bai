# bai
BAI

Tworzymy plik z klasą, która będzie miała nazwę składającą się z imienia i nazwiska bez polskich znaków
AleksanderCichowicz.class.php - nazwa pliku
class AleksanderCichowicz - nazwa klasy w środku
każda klasa ma zawierać chronione zmienne firstName oraz lastName oraz domyślnie przypisane wartości odpowiadające waszym danym

<?php
require_once 'person.abstract.php';

class DominikWiktorowicz extends Person 
{
  protected $firstName = 'Dominik';
  protected $lastName = 'Wiktorowicz';
}
