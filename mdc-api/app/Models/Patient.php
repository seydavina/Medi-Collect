<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
        'numero',
        'infoSocio',
        'antecedent',
        'signesCliniques',
        'signesPara',
        'traitement',
        'evolutionApresSortie'
    ];

    use HasFactory;
}
