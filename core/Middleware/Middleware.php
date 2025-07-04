<?php

namespace Core\Middleware;

class Middleware{

    const MAP=[
        'Owner'=>Owner::class,
        'Customer'=>Customer::class
    ];

    public static  function resolve($key){
        if(!$key){
            return;
        }
        $middleware=Middleware::MAP[$key]??false;

        if(!$middleware){
            throw new \Exception('No Match middleware '. $key);
        }
        (new $middleware)->handle();
                
    }

}