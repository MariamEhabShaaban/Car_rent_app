<?php

namespace Models;
use Core\App;

class Cars_model
{

    //add car

    public function add_car($car, $price, $status)
    {


        $db = App::container()->resolve(\Core\Database::class);
        $add = $db->query('INSERT INTO cars (`model_name`,`price`,`status`) VALUES (?,?,?)', [$car, $price, $status]);

        return $db->lastInsertId();;

    }


    public function store_image($ext, $carId)
    {
        $db = App::container()->resolve(\Core\Database::class);
        $store = $db->query('UPDATE cars SET image_ext =? WHERE id= ?', [$ext, $carId]);
        return $store;


    }




    //delete car


    public function delete_car($id)
    {

        $db = App::container()->resolve(\Core\Database::class);
       $delete= $db->query('DELETE FROM cars WHERE id=?', [$id]);
       return $delete;

    }



    //update


    public function update_car($car, $price, $status, $id)
    {

        $db = App::container()->resolve(\Core\Database::class);

        $update = $db->query('UPDATE cars SET model_name = ?, price = ?, `status` = ? WHERE id = ?
', [$car, $price, $status, $id]);
        return $update;

    }


    //get car

    public function get_car($id)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $car = $db->query('SELECT * FROM cars WHERE id= ?',[$id])->find();
        return $car;

    }


    
    public function get_all_cars()
    {
        $db = App::container()->resolve(\Core\Database::class);
        $cars = $db->query('SELECT * FROM cars')->getAll();
        return $cars;

    }



}