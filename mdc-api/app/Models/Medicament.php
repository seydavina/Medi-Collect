<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    protected $fillable = [
        'ref',
        'nom',
        'type',
        'posologie'
    ];

    use HasFactory;
}