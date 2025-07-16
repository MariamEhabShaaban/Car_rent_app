<?php

namespace Models;
use Core\App;

class Cars_model
{



    //add car

    public function add_car($car, $price, $status)
    {

        $token = bin2hex(random_bytes(16));
        $db = App::container()->resolve(\Core\Database::class);
        $add = $db->query('INSERT INTO cars (`model_name`,`price`,`status`,`token`) VALUES (?,?,?,?)', [$car, $price, $status,$token]);

        return $db->lastInsertId();;

    }


    public function store_image($ext, $carId)
    {
        $db = App::container()->resolve(\Core\Database::class);
        $store = $db->query('UPDATE cars SET image_ext =? WHERE id= ?', [$ext, $carId]);
        return $store;


    }





    //delete car


    public function delete_car($token)
    {

        $db = App::container()->resolve(\Core\Database::class);
       $delete= $db->query('DELETE FROM cars WHERE token=?', [$token]);
       return $delete;

    }



    //update


    public function update_car($car, $price, $status, $token)
    {

        $db = App::container()->resolve(\Core\Database::class);

        $update = $db->query('UPDATE cars SET model_name = ?, price = ?, `status` = ? WHERE token = ?
', [$car, $price, $status, $token]);
        return $update;

    }


    public function update_carById($id,$status){
           $db = App::container()->resolve(\Core\Database::class);

        $update = $db->query('UPDATE cars SET  `status` = ? WHERE id = ?
', [ $status, $id]);
        return $update;


    }


    //get car

    public function get_car($token)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $car = $db->query('SELECT * FROM cars WHERE token= ?',[$token])->find();
        return $car;

    }


    
    public function get_all_cars()
    {
        $db = App::container()->resolve(\Core\Database::class);
        $cars = $db->query('SELECT * FROM cars')->getAll();
        return $cars;

    }

    public function update_status($token,$status){
               $db = App::container()->resolve(\Core\Database::class);

        $update = $db->query('UPDATE cars SET  `status` = ? WHERE token = ?
', [ $status, $token]);
        return $update;


    }



}