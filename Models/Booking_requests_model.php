<?php


namespace Models;

use Core\App;
use Models\Cars_model;

class Booking_requests_model
{
    private $db;

    public function __construct($db){
        $this->db=$db;
    }

    //add request

    public function add_request($customer_id, $car_id, $status)
    {
        $token = bin2hex(random_bytes(16));
        $token_expiry = strtotime('+5 hours');
        
        
        $this->db->query('INSERT INTO booking_requests (`customer_id`,`car_id`,`status`,`token`,`token_expiry`) VALUES (?,?,?,?,?)', [$customer_id, $car_id, $status, $token, $token_expiry]);

        return ['id' => $this->db->lastInsertId(), 'token' => $token];



    }



    //update id

    public function upload_id($ext_front, $ext_back, $Id)
    {
      

        $upload = $this->db->query('UPDATE booking_requests SET id_front =?, id_back=? WHERE id= ?', [
            $ext_front,
            $ext_back,
            $Id
        ]);

        return $upload?true:false;
    }



    //update passport
    public function upload_passport($ext_pass, $Id)
    {
       

        $upload = $this->db->query('UPDATE booking_requests SET passport =? WHERE id= ?', [
            $ext_pass,
            $Id
        ]);


        return $upload?true:false;
    }



    //update license

    public function upload_license($ext_license, $Id)
    {
        

        $upload = $this->db->query('UPDATE booking_requests SET license =? WHERE id= ?', [
            $ext_license,
            $Id
        ]);

        return $upload?true:false;
    }


    //update date

    public function set_date($time, $Id)
    {
      

        $date = $this->db->query('UPDATE booking_requests SET date =? WHERE id= ?', [
            $time,
            $Id
        ]);


        return $date?true:false;
    }


    //update pay

    public function payment_method($pay_method, $Id)
    {
       
        $pay = $this->db->query('UPDATE booking_requests SET payment_method =? WHERE id=?', [$pay_method, $Id]);

        return $pay?true:false;
    }




    //get request

    public function get_request($token)
    {

       

        $request = $this->db->query('SELECT br.id as book_id ,br.id_front,br.id_back,c.model_name,br.passport,br.license, br.payment_method,br.date,c.image_ext,br.car_id,br.token,br.token_expiry FROM booking_requests as br join cars as c ON br.car_id = c.id WHERE br.token=?', [$token])->find();

        return $request;




    }

    public function get_requestByCarId($id)
    {

        

        $request = $this->db->query('SELECT token FROM booking_requests WHERE car_id=?', [$id])->find();

        return $request;




    }

   

    // update status 
    public function update_status($token, $status)
    {

       return $this->db->query("UPDATE booking_requests SET status=? WHERE token=?", [$status, $token]);
 
    }

    public function available_cars($id)
    {
      
        $rented_cars = $this->db->query("
SELECT c.model_name, c.price, c.token, c.status as car_status
    FROM cars AS c
    WHERE NOT EXISTS (
        SELECT 1
        FROM booking_requests AS br
        WHERE br.car_id = c.id 
          AND br.customer_id =?
          AND (br.status = 'pending' or br.status = 'accepted') 
    )
", [$id])->getAll();

        return $rented_cars;


    }


    public function rented_cars()
    {

        $this->expire();
       
        $rented_cars = $this->db->query("SELECT c.model_name, c.price, c.token as car_token, c.status as car_status,br.status as book_status,br.token as book_token,br.token_expiry  FROM cars as c join booking_requests as br ON c.id= br.car_id ")->getAll();
       

        return $rented_cars;


    }


    public function delete($token)
    {
       
        $delete =$this->db->query('DELETE FROM booking_requests WHERE token= ?', [$token]);
        return $delete?true:false;

    }

  public function expire(){
    $expired_count = 0;
    $requests = $this->get_all_requests();
    foreach($requests as $request){
        if (check_expire($request['token_expiry'])) {
            $this->update_status($request['token'], 'No_answer');
            $car = new Cars_model($this->db);
            $car->update_car_statusById($request['car_id'], 'Available');
            $expired_count++;
        }
    }
    return $expired_count;
}


    public function get_all_requests(){
       
        $req = $this->db->query("SELECT * FROM booking_requests")->getAll();
        return $req;

    }

    public function get_pending(){
        
        $req = $this->db->query("SELECT COUNT(*) as count FROM booking_requests WHERE status=?",['pending'])->find();
        return $req;

    }





    //get all requests

}