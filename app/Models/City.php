<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function search($wordSearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$wordSearch}%")
        ->paginate($totalPage);
    }

}
