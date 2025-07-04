<?php

namespace Core;

class Container{
    protected $binding=[];

    public function bind($key ,$resolver){

        $this->binding[$key]=$resolver;
    }

    public function resolve($key){

        if(array_key_exists($key,$this->binding)){
            return call_user_func($this->binding[$key]);
        }


    }
}