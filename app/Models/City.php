<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function state()
    {
        return $this->belongsTo(State::class); // Pertence a
    }

    public function search($wordSearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$wordSearch}%")->paginate($totalPage);
    }

    public function airports()
    {
        return $this->hasMany(Airport::class); // Tem muitos
    }

}
