<?php


namespace Models;

use Core\App;
use Models\Cars_model;

class Booking_requests_model
{


    //add request

    public function add_request($customer_id, $car_id, $status)
    {
        $token = bin2hex(random_bytes(16));
        $token_expiry = strtotime('+5 hours');

        $db = App::container()->resolve(\Core\Database::class);
        $db->query('INSERT INTO booking_requests (`customer_id`,`car_id`,`status`,`token`,`token_expiry`) VALUES (?,?,?,?,?)', [$customer_id, $car_id, $status, $token, $token_expiry]);

        return ['id' => $db->lastInsertId(), 'token' => $token];



    }



    //update id

    public function upload_id($ext_front, $ext_back, $Id)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $upload = $db->query('UPDATE booking_requests SET id_front =?, id_back=? WHERE id= ?', [
            $ext_front,
            $ext_back,
            $Id
        ]);

        return $upload;
    }



    //update passport
    public function upload_passport($ext_pass, $Id)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $upload = $db->query('UPDATE booking_requests SET passport =? WHERE id= ?', [
            $ext_pass,
            $Id
        ]);


        return $upload;
    }



    //update license

    public function upload_license($ext_license, $Id)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $upload = $db->query('UPDATE booking_requests SET license =? WHERE id= ?', [
            $ext_license,
            $Id
        ]);

        return $upload;
    }


    //update date

    public function set_date($time, $Id)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $date = $db->query('UPDATE booking_requests SET date =? WHERE id= ?', [
            $time,
            $Id
        ]);


        return $date;
    }


    //update pay

    public function payment_method($pay_method, $Id)
    {
        $db = App::container()->resolve(\Core\Database::class);
        

        $pay = $db->query('UPDATE booking_requests SET payment_method =? WHERE id=?', [$pay_method, $Id]);

        return $pay;
    }




    //get request

    public function get_request($token)
    {

        $db = App::container()->resolve(\Core\Database::class);

        $request = $db->query('SELECT br.id as book_id ,br.id_front,br.id_back,c.model_name,br.passport,br.license, br.payment_method,br.date,c.image_ext,br.car_id,br.token,br.token_expiry FROM booking_requests as br join cars as c ON br.car_id = c.id WHERE br.token=?', [$token])->find();

        return $request;




    }

    public function get_requestByCarId($id)
    {

        $db = App::container()->resolve(\Core\Database::class);

        $request = $db->query('SELECT token FROM booking_requests WHERE car_id=?', [$id])->find();

        return $request;




    }

    public function set_token()
    {
        $token = bin2hex(random_bytes(16));

        $db = App::container()->resolve(\Core\Database::class);
        $set_token = $db->query("UPDATE booking_requests SET token=?, token_expiry=? WHERE id=?", [
            $token,
            date('Y-m-d H:i:s', strtotime('+1 minutes')),
            $_SESSION['booking_id']
        ]);
        if ($set_token) {

            return $token;

        }

        return false;
    }

    // update status 
    public function update_status($token, $status)
    {
        $db = App::container()->resolve(\Core\Database::class);

        $status = $db->query("UPDATE booking_requests SET status=? WHERE token=?", [$status, $token]);

        return $status;
    }

    public function available_cars()
    {
        $db = App::container()->resolve(\Core\Database::class);
        $rented_cars = $db->query("
SELECT c.model_name, c.price, c.token, c.status as car_status
    FROM cars AS c
    WHERE NOT EXISTS (
        SELECT 1
        FROM booking_requests AS br
        WHERE br.car_id = c.id 
          AND br.customer_id =?
          AND br.status = 'pending' or br.status = 'accepted' 
    )
", [$_SESSION['id']])->getAll();

        return $rented_cars;


    }


    public function rented_cars()
    {

        $this->expire();
        $db = App::container()->resolve(\Core\Database::class);
        $rented_cars = $db->query("SELECT c.model_name, c.price, c.token as car_token, c.status as car_status,br.status as book_status,br.token as book_token,br.token_expiry  FROM cars as c join booking_requests as br ON c.id= br.car_id ")->getAll();
       

        return $rented_cars;


    }


    public function delete($token)
    {
        $db = App::container()->resolve(\Core\Database::class);
        $delete = $db->query('DELETE FROM booking_requests WHERE token= ?', [$token]);
        return $delete;

    }

    public function expire(){
         $requests = $this->get_all_requests();
         foreach($requests as $request): 
            $expired = check_expire($request['token_expiry']);
        if ($expired) {
            $this->update_status($request['token'], 'No_answer');
            $car = new Cars_model;
            $update_car= $car->update_carById($request['car_id'],'Available');
            return true;
        }
    endforeach;
    return false;

    }

    public function get_all_requests(){
        $db = App::container()->resolve(\Core\Database::class);
        $req = $db->query("SELECT * FROM booking_requests")->getAll();
        return $req;

    }





    //get all requests

}