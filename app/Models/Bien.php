<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'image',
        'description',
        'categorie_id',
        'personnel_id',
        'adresse',
        'statut',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
   

    public function commentaires()
    {
       return $this->hasMany(Commentaire::class);
    }

}


