<?php

class OptionValue {

    private $value;
    private $arr;

    function __construct($value)
    {
        $this->value = $value;
        $this->arr;
    }

    function getValue() {

        $this->arr = str_split($this->value);
        for($i =0; $i < count($this->arr);$i ++)
          echo "<option value='$i'>{$this->arr[$i]}</option>";

    }
}

$OptionValue = new OptionValue('+-/*');
