<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'image',
        'description',
        'categorie_id',
        'adresse',
        'statut',
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
   
}


