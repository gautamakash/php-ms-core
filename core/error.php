<?php
class ServiceError{
    /**
    */
    public $code = 500;
    public $error = 'Method not found';
    
    
   function __construct($stringJson) {
       $json = json_decode($stringJson);
       if(isset($json->code)){
           $this->code = $json->code;
       }
       if(isset($json->error)){
           $this->error = $json->error;
       }
   }
}
?>