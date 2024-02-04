<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf_cnpj',
        'name',
        'email',
        'phone',
        'address',
        'number',
        'city',
        'state',
        'country'
    ];
}