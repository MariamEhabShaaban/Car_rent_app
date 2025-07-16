<?php

namespace Models;

class Rating_model{
    private $db;

    public function __construct($db){
        $this->db=$db;
    }



    public function add_rate($availability, $credibility, $attitude){
        
         $add = $this->db->query("INSERT INTO rating (`availability`,`credibility`,`attitude`) VALUES (?,?,?)",[$availability,$credibility,$attitude]);
         return $add?true:false;

    }

    public function average_rate(){
        
         $rate= $this->db->query('SELECT AVG(`availability`) AS availability ,AVG(`credibility`) AS credibility , AVG(`attitude`) AS attitude FROM rating')->find();
         return $rate;

    }
}