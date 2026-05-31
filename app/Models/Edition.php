<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edition extends Model
{
    use HasFactory;
       protected $fillable = ['nom', 'adresse'];

    // Une édition possède plusieurs livres
    public function livres(): HasMany
    {
        return $this->hasMany(Livre::class);
    }
}
