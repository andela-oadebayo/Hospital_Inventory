<?php
/**
 * Created by PhpStorm.
 * User: OluwadamilolaAdebayo
 * Date: 6/23/15
 * Time: 4:07 PM
 */

class Pharmacy extends Eloquent{

    protected $table = 'pharmacy';

    public static function getInventory($invent){
        return Pharmacy::where('pharmacy_id', $invent)->get();
    }

}