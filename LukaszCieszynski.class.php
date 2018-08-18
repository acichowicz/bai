<?php
/**
 * Created by PhpStorm.
 * User: ciesz
 * Date: 18.08.2018
 * Time: 09:56
 */

require_once 'person.abstract.php';

class LukaszCieszynski extends Person {
    protected $firstName = 'Łukasz';
    protected $lastName = 'Cieszyński';

    public $counter = 0;

    public function saveData()
    {
        $folder = glob('data');
        $this->counter = $this->getCounter($this->counter);

        if (empty($folder)) {
            mkdir('data');
        }
        file_put_contents('data/'.get_class($this).'.counter.txt', $this->counter);
    }


}

