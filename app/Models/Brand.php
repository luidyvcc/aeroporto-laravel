<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name']; //Aqui são definidos os campos que podem ser preenchidos


    public function search($wordSearch, $totalPage = 10)
    {
        return $this->where('name', 'LIKE', "%{$wordSearch}%")->paginate($totalPage);
    }

}
