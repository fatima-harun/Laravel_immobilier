<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'telephone',
    ];
    public function biens()
      {
        return $this->hasMany(Bien::class);
      }
}
