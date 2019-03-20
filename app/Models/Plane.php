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

    public function search($wordSearch, $totalPage = 10)
    {
        return $this->where('id', $wordSearch)
                    ->orWhere('qty_passengers', $wordSearch)
                    ->orWhere('class', $wordSearch)
                    ->paginate($totalPage);
                    
    }

}
