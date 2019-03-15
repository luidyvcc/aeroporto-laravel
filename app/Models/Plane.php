<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['brand_id', 'qty_passengers', 'class'];

    public function classes($className = null){
        $classes = 
        [
            'economic'  =>  'Economica',
            'luxury'    =>  'Luxo'
        ];

        return $className ? $classes[$className] : $classes;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
