<?php
namespace Core;
 class validator{

    public static function string($data,$min=1,$max=INF){
        return strlen($data)>=$min && strlen($data)<=$max;
     }

     public static function email($email){
      return filter_var($email,FILTER_VALIDATE_EMAIL);
     }

     

    }