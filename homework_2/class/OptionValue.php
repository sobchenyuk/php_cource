<?php

class OptionValue {

    private $value;
    private $arr;

    function __construct($value)
    {
        $this->value = $value;
        $this->arr = str_split($this->value);
    }

    function getValue() {
        for($i =0; $i < count($this->arr); $i++)
          echo "<option value='$i'>{$this->arr[$i]}</option>";
    }
}

$OptionValue = new OptionValue('+-/*');
