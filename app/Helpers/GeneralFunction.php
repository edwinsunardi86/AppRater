<?php
namespace App\Helpers;
use DB;
class GeneralFunction{
    static function groupBy($array, $key) {
        $groupedData = [];
        $data = [];
        $_id = "";
        for ($i=0; $i < count($array); $i++) { 
            $row = $array[$i];
            if($row[$key] != $_id){
                if(count($data) > 0){
                    $groupedData[] = $data;
                }
        
                $_id = $row[$key];
                $data = [
                    $key => $_id
                ];
            }
        
            unset($row[$key]);
            $data["data"][] = $row;
    
            if($i == count($array) - 1){
                $groupedData[] = $data;
            }
        }
        
        return $groupedData; 
    }
    
}
