<?php

namespace Models;
use Core\App;
class Rating_model{



    public function add_rate($availability, $credibility, $attitude){
         $db = App::container()->resolve(\Core\Database::class);
         $add = $db->query("INSERT INTO rating (`availability`,`credibility`,`attitude`) VALUES (?,?,?)",[$availability,$credibility,$attitude]);
         return $add;

    }

    public function avarage_rate(){
         $db = App::container()->resolve(\Core\Database::class);
         $rate= $db->query('SELECT AVG(`availability`) AS availability ,AVG(`credibility`) AS credibility , AVG(`attitude`) AS attitude FROM rating')->find();
         return $rate;

    }
}