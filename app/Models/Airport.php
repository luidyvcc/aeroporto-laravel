<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [ 'city_id', 'name', 'latitude',
                            'longitude', 'address', 'number',
                            'zip_code', 'complement'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
