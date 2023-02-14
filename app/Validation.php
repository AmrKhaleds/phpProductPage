<?php 
    namespace App;

    class Validation{
        public $inputValue;
        public $inputName;
        public $errors = [];

        // Set Input Name 
        public function inputName($inputName){
            $this->inputName = $inputName;
            return $this;
        }
        // Set Input Value 
        public function inputValue($inputValue){
            $this->inputValue = $inputValue;
            return $this;
        }
        // Check if Input field is empty
        public function is_empty(){
            if(empty($this->inputValue)){
                $this->errors[] = "{$this->inputName} mustn't be Empty";
            }
            return $this;
        }
        // check sku and name if contain string or intger or all
        public function is_string(){
            $strPattern = "/[\p{L}\s]/";
            $intPattern = "/[0-9]+/";
            if(!preg_match($strPattern, $this->inputValue) && !preg_match($intPattern, $this->inputValue)){
                $this->errors[] = "{$this->inputName} must be valid";
            }
            return $this;
        }
        
        public function is_num(){
            $pattern = "/^-?(?:\d+|\d*\.\d+)$/";
            if(!preg_match($pattern, $this->inputValue)){
                $this->errors[] = "{$this->inputName} must be Number";
            };
            return $this;
        }
        // get all errors
        public function getErrors(){
            return $this->errors;
        }
    }
