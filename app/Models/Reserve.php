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

}
