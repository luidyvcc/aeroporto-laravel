<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class); // Pertence a
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class); // Pertence a
    }

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

}
