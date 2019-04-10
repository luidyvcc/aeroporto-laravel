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

    public function getItems($totalPage = 10)
    {
        return $this->with(['origin','destination'])->paginate($totalPage);
    }

    public function storeFlight(Request $request)
    {
        $data = $request->all();
        // $data['airport_origin_id'] = $request['origin'];
        // $data['airport_destination_id'] = $request['destination'];
        $data['is_promotion'] = $request['is_promotion']=='on'?1:0;

        return $this->create($data);
    }

    public function updateFlight(Request $request)
    {
        $data = $request->all();
        // $data['airport_origin_id'] = $request['origin'];
        // $data['airport_destination_id'] = $request['destination'];
        $data['is_promotion'] = $request['is_promotion']=='on'?1:0;

        return $this->update($data);
    }

    public function origin()
    {
        return $this->belongsTo(Airport::class, 'airport_origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'airport_destination_id');
    }
}
