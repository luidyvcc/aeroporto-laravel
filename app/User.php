<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function search($request, $totalPage = 10)
    {
        $users = $this->where(function($query) use($request) {
            if ($request->code) $query->where('id', $request->code);            
            if ($request->name) $query->where('name', 'LIKE', '%'.$request->name.'%');
            if ($request->email) $query->where('email', 'LIKE', '%'.$request->email.'%');
        })->paginate($totalPage);

        return $users;
    }

    public function storeUser(Request $request, $nameFile = "")
    {
        // $data = $request->all();
        // $data['image'] = $nameFile;
        // $data['password'] = bcrypt( $data['password'] );
        // return $this->create($data);

        $this->name = $request->name;
        $this->email = $request->email;
        $this->image = $nameFile;
        $this->password = bcrypt($request->password);
        $this->is_admin = $request->is_admin ? true : false;

        return $this->save();
    }

    public function updateUser(Request $request, $nameFile = "")
    {
        // $data = $request->all();

        // $data['is_admin'] = $request['is_admin']?true:false;

        // $data['image'] = $nameFile;

        // if( isset( $data['password'] ) && $data['password'] != '' )
        //     $data['password'] = bcrypt( $data['password'] );
        // else 
        //     unset( $data['password'] );

        // return $this->update($data);

        $this->name = $request->name;
        $this->email = $request->email;
        $this->image = $nameFile;
        $this->is_admin = $request->is_admin ? true : false;
        if ( $request->password && $request->password != '' )
            $this->password = bcrypt($request->password);


        return $this->save();
    }
}
