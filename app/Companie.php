<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'logo',
        'site'
    ];
}
