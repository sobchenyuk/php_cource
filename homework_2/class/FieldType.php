<?php

class FieldType {
    private $firstNumber;
    private $lastNumber;
    private $post;
    private $test;

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
        $this->testFunck();
    }

    function testFunck($a = NULL){
        return $a;
    }


    public function getType(){

        if(!empty($this->post)){
            if(isset($this->post['firstNumber'])&& $this->post['lastNumber']){

                $this->firstNumber = $this->post['firstNumber'];
                $this->lastNumber = $this->post['lastNumber'];



                if(!is_numeric($this->firstNumber) || !is_numeric($this->lastNumber)){
                    echo "<p class=\"bg-danger text-center\">Вы не ввили число!</p>";

                    $this->testFunck('1');

                }
            }else{
                echo "<p class=\"bg-danger text-center\">Вы отправили пустую форму!</p>";
            }
        }

    }


    public function setResult(){
         $this->testFunck();
       //echo $this->test;
        /*if($this->test == "true"){
            echo 'true';
        }else{
            echo 'false';
        }*/
        //echo $this->res;


    }

}

$FieldType = new FieldType($_POST);