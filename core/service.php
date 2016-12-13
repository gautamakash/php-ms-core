<?php

include("error.php");
/**
Service Class Defination
*/
abstract class Service{
    /**
    Declear Public Variables
    */
    
    /**
    Declear private Variable
    */
    
    
    function __construct() {
        /**
        Implement Config Reading
        */
    }
    
    /**
    Define method
    */
    function process(){
        header('Content-Type: application/json');
        //@TODO check Authentication if enable
        if(isset($_REQUEST['_info']) && $_REQUEST['_info'] == ""){
            echo('{"info": "Sample Info"}');
        }else{
            try{
                switch($_SERVER['REQUEST_METHOD'])
                {
                case 'GET': 
                        echo(json_encode($this->GET())); break;
                case 'POST': 
                        echo(json_encode($this->POST())); break;
                case 'PUT': 
                        echo(json_encode($this->PUT())); break;
                case 'DELETE': 
                        echo(json_encode($this->DELETE())); break;
                default:
                }
            }catch (Exception $e){  
                http_response_code(500);
                echo(json_encode(new ServiceError('{"code": 500, "error": "Internal runtime error"}')));
            }
        }
    }
    
    // Define Config Update
    
    /**
    Default Implementation
    */
    protected function GET(){
        return $this->error();
    }
    protected function POST(){
        return $this->error();
    }
    protected function PUT(){
        return $this->error();
    }
    protected function DELETE(){
        return $this->error();
    }
    private function ERROR(){        
        http_response_code(500);
        return new ServiceError('{"error": "Method is not permitted in this service"}');
    }
    
    /**
    Define Getter Setter
    */
}
?>