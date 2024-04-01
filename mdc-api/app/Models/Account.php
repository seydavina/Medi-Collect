<?php

namespace App\Models;

<<<<<<< HEAD:mdc-api/mdc-api/app/Models/Account.php
use App\Models\Medicament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2ebb14dea6d273f4ff57dbfcb018477538a5aed7:mdc-api/app/Models/Account.php

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_type',
        'username',
        'password',
    ];

<<<<<<< HEAD:mdc-api/mdc-api/app/Models/Account.php
<<<<<<<< HEAD:mdc-api/mdc-api/app/Models/Account.php
=======
>>>>>>> 2ebb14dea6d273f4ff57dbfcb018477538a5aed7:mdc-api/app/Models/Account.php
    public function user()
    {
        return $this->morphTo();
    }
<<<<<<< HEAD:mdc-api/mdc-api/app/Models/Account.php
========
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
>>>>>>>> 2ebb14dea6d273f4ff57dbfcb018477538a5aed7:mdc-api/app/Models/Ordonnance.php
=======
>>>>>>> 2ebb14dea6d273f4ff57dbfcb018477538a5aed7:mdc-api/app/Models/Account.php
}
