<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
    public function search($wordSearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$wordSearch}%")
                    ->orWhere('initials', $wordSearch)
                    ->paginate($totalPage);
                    
    }
}
