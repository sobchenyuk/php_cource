<?php

class Two
{
    protected $age;

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

        }
        else if ($age >= 6 && $age <= 17)
        {
            echo "Вам пора в школу";

        }
        else if ($age >= 18 && $age <= 65)
        {
            echo "Вам пора на работу";

        }
    }

}

class Three extends Two
{

    public function performance()
    {
        $age = $this->age;

        switch ($age)
        {
            case $age <= 4:
                echo "Вам пора в детский сад";
                break;
            case $age >= 6 && $age <= 17:
                echo "Вам пора в школу";
                break;
            case $age >= 18 && $age <= 65:
                echo "Вам пора на работу";
                break;
        }

    }
}


$two = new Two(34);
$two->performance();
echo "<br />";
$three = new Three(34);
$three->performance();

