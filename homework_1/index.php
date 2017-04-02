<?php
class One{
    private $name,$surname,$age;

    function __construct($name,$surname,$age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function performance()
    {
        echo "Меня зовут " . $this->name;
        echo "Моя фамилия " . $this->surname;
        echo "Мне " . $this->age . "лет";
    }
}

$one = new One("Андрей","Собченюк","34");


$one->performance();
