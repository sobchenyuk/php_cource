<?php
class Two{
    private $age;
    function __construct($age)
    {
        $this->age = $age;
    }
    public function performance()
    {
        $age = $this->age;
        if($age <= 4)
        {
            echo "Вам пора в детский сад";

        }elseif ($age >= 6 || $age <= 17)
        {
            echo "Вам пора в школу";

        }elseif ($age >= 18 || $age <= 65)
        {
            echo "Вам пора на работу";

        }
    }
}
$two = new Two("34");


$two->performance();
