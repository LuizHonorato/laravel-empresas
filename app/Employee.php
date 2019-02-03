<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function companie()
    {
        return $this->belongsTo('App\Companie');
    }

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'cpf',
        'company_id'
    ];
}
