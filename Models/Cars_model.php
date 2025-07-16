<?php

namespace Models;


class Cars_model
{

   private $db;
   public function __construct($db){
  
    $this->db=$db;
   }

    //add car

    public function add_car($car, $price, $status)
    {

        $token = bin2hex(random_bytes(16));
       
        $add = $this->db->query('INSERT INTO cars (`model_name`,`price`,`status`,`token`) VALUES (?,?,?,?)', [$car, $price, $status,$token]);

        return $this->db->lastInsertId()??false;

    }


    public function store_image($ext, $carId)
    {
      
        $store = $this->db->query('UPDATE cars SET image_ext =? WHERE id= ?', [$ext, $carId]);
        return $store?true:false;


    }





    //delete car


    public function delete_car($token)
    {

      
       $delete= $this->db->query('DELETE FROM cars WHERE token=?', [$token]);
       return $delete?true:false;

    }



    //update


    public function update_car($car, $price, $status, $token)
    {

      

        $update = $this->db->query('UPDATE cars SET model_name = ?, price = ?, `status` = ? WHERE token = ?
', [$car, $price, $status, $token]);
        return $update?true:false;

    }


    public function update_car_statusById($id,$status){
         

        $update = $this->db->query('UPDATE cars SET  `status` = ? WHERE id = ?
', [ $status, $id]);
        return $update?true:false;


    }


    //get car

    public function get_car($token)
    {
        

        $car =$this->db->query('SELECT * FROM cars WHERE token= ?',[$token])->find();
        return $car;

    }


    
    public function get_all_cars()
    {
       
        $cars = $this->db->query('SELECT * FROM cars')->getAll();
        return $cars;

    }

    public function update_car_statusByToken($token,$status){
              
        $update = $this->db->query('UPDATE cars SET  `status` = ? WHERE token = ?
', [ $status, $token]);
        return $update?true:false;


    }



}