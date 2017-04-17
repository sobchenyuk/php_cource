<?php

class FieldType {
    private $firstNumber;
    private $lastNumber;
    private $post;
    public $test;

    /**
     * FieldType constructor.
     * @param $post
     */
    function __construct($post)
    {
        $this->post = $post;
        $this->firstNumber;
        $this->lastNumber;
        $this->test;
    }

    public function setResult(){
        /*if($this->test == 1){
            echo '1';
        }*/



        //return $this->test = 1;

        echo $this->test;
    }

    public function getType(){

        if(!empty($this->post)){
            if(isset($this->post['firstNumber'])&& $this->post['lastNumber']){

                $this->firstNumber = $this->post['firstNumber'];
                $this->lastNumber = $this->post['lastNumber'];



                if(!is_numeric($this->firstNumber) || !is_numeric($this->lastNumber)){
                    echo "<p class=\"bg-danger text-center\">Вы не ввили число!</p>";

                    $this->test = 1;

                    //$this->res =1;
                    //global $this->test = 1;

                    //echo $this->test;
                }
            }else{
                echo "<p class=\"bg-danger text-center\">Вы отправили пустую форму!</p>";
            }
        }

    }

}

$FieldType = new FieldType($_POST);