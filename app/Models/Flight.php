<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;

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

    public function storeFlight(Request $request, $nameFile = "")
    {
        $data = $request->all();
        // $data['airport_origin_id'] = $request['origin'];
        // $data['airport_destination_id'] = $request['destination'];
        $data['is_promotion'] = $request['is_promotion']=='on'?1:0;
        $data['image'] = $nameFile;

        return $this->create($data);
    }

    public function updateFlight(Request $request, $nameFile = "")
    {
        $data = $request->all();
        // $data['airport_origin_id'] = $request['origin'];
        // $data['airport_destination_id'] = $request['destination'];
        $data['is_promotion'] = $request['is_promotion']=='on'?1:0;
        $data['image'] = $nameFile;

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

    public function search($request, $totalPage = 10)
    {
        $flights = $this->where(function($query) use($request) {
            if ($request->code) $query->where('id', $request->code);
            if ($request->date) $query->where('date', '>=', $request->date);
            if ($request->hour_output) $query->where('hour_output', $request->hour_output);
            if ($request->total_stops) $query->where('qty_stops', $request->total_stops);
            if ($request->origin) $query->where('airport_origin_id', $request->origin);
            if ($request->destination) $query->where('airport_destination_id', $request->destination);
        })->paginate($totalPage);

        return $flights;
    }

    // public function getDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }
}
