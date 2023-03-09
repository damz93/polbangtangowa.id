<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;


    use HasFactory;
    protected $table = 'users';
    //protected $fillable = ['',''];
    protected $guarded = [];
    protected $fillable =[
        'nama','email','password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

}