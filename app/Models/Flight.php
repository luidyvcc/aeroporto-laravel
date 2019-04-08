<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Flight extends Model
{
    protected $fillable = [
       'plane_id',
       'airport_origin_id',
       'airport_destination_id',
       'date',
       'time_duration',
       'hour_output',
       'arrival_time',
       'old_price',
       'price',
       'total_plots',
       'is_promotion',
       'image',
       'qty_stops',
       'descrition',
    ];

    public function storeFlight(Request $request)
    {
        $data = $request->all();
        $data['airport_origin_id'] = $request['origin'];
        $data['airport_destination_id'] = $request['destination'];
        $data['is_promotion'] = $request['is_promotion']=='on'?1:0;

        return $this->create($data);
    }
}
