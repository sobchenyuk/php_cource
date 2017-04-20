<?php

class FieldType {
    private $firstNumber;
    private $lastNumber;
    private $options;
    private $post;
    public $res;
    private $err;
    private $num = 3;
    private $test;

    /**
     * FieldType constructor.
     * @param $post
     */
    function __construct($post)
    {
        $this->post = $post;
        if(!empty($this->post)){
            if(isset($this->post['firstNumber'])&& $this->post['lastNumber']) {
                $this->firstNumber = $this->post['firstNumber'];
                $this->lastNumber = $this->post['lastNumber'];
                $this->options = $this->post['options'];
            }else{
                FieldType::getError("Вы отправили пустую форму!");
            }
            return $this->test = true;
        }
        return $this->test = false;
    }

    private function getError($error){
        return $this->err = "<p class=\"bg-danger text-center\">$error</p>";
    }

    public function getType(){
        if($this->test === true){
            if(empty($this->err)){
                if(is_numeric($this->firstNumber) && is_numeric($this->lastNumber)){
                    if((strlen($this->firstNumber) > $this->num) || (strlen($this->lastNumber)  > $this->num)){
                        FieldType::getError("Поля ввода не могут содержать больше трех символов");
                    }else{
                        switch ($this->options){
                            case 0:
                                $this->res = $this->firstNumber + $this->lastNumber;
                                break;
                            case 1:
                                $this->res = $this->firstNumber - $this->lastNumber;
                                break;
                            case 2:
                                $this->res = $this->firstNumber / $this->lastNumber;
                                break;
                            case 3:
                                $this->res = $this->firstNumber * $this->lastNumber;
                                break;
                        }
                    }
                }else {
                    FieldType::getError("Вы не ввили число!");
                }
            }
            echo $this->err;
        }
    }
}

$FieldType = new FieldType($_POST);