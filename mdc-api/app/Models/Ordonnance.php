<?php

namespace App\Models;

use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ordonnance extends Model
{

    protected $fillable = [
        'numero',
        'datePrescription'
    ];

    public function medicaments()
    {
        return $this->belongsToMany(
            Medicament::class,
            'ordonnance_medicament',
            'ordonnance_id',
            'medicament_id'
        )
            ->withPivot('quantite');
    }

    use HasFactory;
}
