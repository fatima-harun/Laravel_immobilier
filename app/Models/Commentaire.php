<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
      'auteur',
      'contenu',
      'bien_id',

    ];
    public function bien()
    {
        return $this->Belongsto(Bien::class);
    }
}
