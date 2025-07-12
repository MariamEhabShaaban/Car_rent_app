<?php


namespace Models;

use Core\App;


class Booking_requests_model{
    

    //add request

    public function add_request($customer_id, $car_id,$status){
     

            $db = App::container()->resolve(\Core\Database::class);
            $db->query('INSERT INTO booking_requests (`customer_id`,`car_id`,`status`) VALUES (?,?,?)', [$customer_id, $car_id,$status]);
            return $db->lastInsertId();



    }



    //update id

    public function upload_id( $ext_front,$ext_back,$Id){
         $db = App::container()->resolve(\Core\Database::class);

        $upload= $db->query('UPDATE booking_requests SET id_front =?, id_back=? WHERE id= ?', [
            $ext_front,
            $ext_back,
            $Id
        ]);

        return $upload;
    }



    //update passport
  public function upload_passport( $ext_pass,$Id){
         $db = App::container()->resolve(\Core\Database::class);

        $upload= $db->query('UPDATE booking_requests SET passport =? WHERE id= ?', [$ext_pass,
         $Id]);


        return $upload;
    }



    //update license

      public function upload_license( $ext_license,$Id){
         $db = App::container()->resolve(\Core\Database::class);

        $upload= $db->query('UPDATE booking_requests SET license =? WHERE id= ?', [
           $ext_license,
            $Id
        ]);

        return $upload;
    }


    //update date

      public function set_date( $time,$Id){
         $db = App::container()->resolve(\Core\Database::class);

        $date= $db->query('UPDATE booking_requests SET date =? WHERE id= ?', [$time,
         $Id]);


        return $date;
    }


    //update pay

      public function payment_method( $pay_method,$Id){
         $db = App::container()->resolve(\Core\Database::class);

        $pay=  $db->query('UPDATE booking_requests SET payment_method =? WHERE id=?', [$pay_method,$Id]);

        return $pay;
    }


   

    //get requests



    //get all requests

}