<?php
namespace App\Models;

class Listing{
    
    public static function all(){
        return

        [
            [
                'id'=>1,
                'title'=>'listing one',
                'description'=>'dfdsfdsfdsfds'
            ],
            [
                'id'=>2,
                'title'=>'listing two',
                'description'=>'desc two'
            ]
            ];
    }


    public static function find($id){
        $listings=self::all();

        foreach($listings as $listing){
            if($listing['id']==$id){
                return $listing;
            }
        }
    }
}