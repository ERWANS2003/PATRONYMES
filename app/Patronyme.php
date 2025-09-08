<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patronyme extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'region_id',
        'departement_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

     public function patronymes()
    {
        return $this->hasMany(Patronyme::class);
    }

}
