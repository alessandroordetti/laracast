<?php 

namespace Core;

class Fakedata
{
    public static function generateData(){
        $data = [];
        for($i = 0; $i < 10; $i++){
            $data[] = 'Lorem ipsum dolor ' . $i; 
        }
        return $data;
    }
}