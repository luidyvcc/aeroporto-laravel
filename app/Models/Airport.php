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

    public function search($request, $totalPage = 10)
    {
        $airports = $this->where(function($query) use($request) {
            if ($request->code) $query->where('id', $request->code);            
            if ($request->city_id) $query->where('city_id', $request->city_id);
            if ($request->name) $query->where('name', 'LIKE', '%'.$request->name.'%');
            if ($request->zip_code) $query->where('zip_code', $request->zip_code);
        })->paginate($totalPage);

        return $airports;
    }
}
