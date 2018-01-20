<?php
//This class wraps all the information related with the main system configuration. Ex. Relative paths, name servers ..  
class Config{
    
    const PATH = "http://127.0.0.1/cut";

    function Config(){
    	
    }
    
    function printPath($string){
    	echo self::PATH.$string;
    }
    
    function debugArray($array){

    	print "<pre>";
		print_r($commerce);
		print "</pre>";

    }

}
?>