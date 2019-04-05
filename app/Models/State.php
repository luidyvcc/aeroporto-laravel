<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function search($wordSearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$wordSearch}%")
                    ->orWhere('initials', $wordSearch)
                    ->paginate($totalPage);
                    
    }

    public function searchCities($wordSearch, $totalPage = 10)
    {
        return $this->cities()->where('name', 'LIKE', "%{$wordSearch}%")
        ->paginate($totalPage);
    }
}
