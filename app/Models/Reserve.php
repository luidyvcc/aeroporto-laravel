<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    protected $fillable = [
        'user_id',
        'flight_id',
        'date_reserved',
        'status',
    ];

    public function statuses($statusName = null){

        $statuses = 
        [
            'reserved'  =>  'Reservado',
            'canceled'  =>  'Cancelado',
            'paid'  =>  'Pago',
            'concluded' => 'Concluído',
        ];

        return $statusName ? $statuses[$statusName] : $statuses;
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Pertence a
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class); // Pertence a
    }

    public function updateStatus($status)
    {
        $this->status = $status;

        return $this->save();
    }

    public function search($request, $totalPage = 10)
    {
        $reserves = $this
        
            ->join('users', 'users.id', '=', 'reserves.user_id')
            ->join('flights', 'flights.id', '=', 'reserves.flight_id')
            ->select(
                'reserves.*',
                'users.name AS user_name',
                'users.email AS user_email',
                'flights.date AS flight_date',
            )
            
            ->where(function($query) use($request) {

                if ($request->reserve_id)
                    $query->where('id', $request->reserve_id);

                if ($request->user_name)
                    $query->where('users.name', 'LIKE', "%{$request->user_name}%");

                if ($request->user)
                    $query->where('users.id', $request->user);

                if ($request->flight)
                    $query->where('flights.id', $request->flight);

                if ($request->status)
                    $query->where('status', $request->status);

                if ($request->date_reserve_start && $request->date_reserve_end) {
                    $query->where('flights.date', '>=', $request->date_reserve_start);
                    $query->where('flights.date', '<=', $request->date_reserve_end);
                } elseif ($request->date_reserve_start) {
                    $query->where('flights.date', '=', $request->date_reserve_start);
                } elseif ($request->date_reserve_end) {
                    $query->where('flights.date', '=', $request->date_reserve_end);
                }
                
            })
            
            ->paginate($totalPage);

        return $reserves;
    }

}
