<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'stock', 'auteur_id', 'edition_id'];

    // Un livre appartient à un auteur
    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Auteur::class);
    }

    // Un livre appartient à une édition
    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    // Un livre peut être concerné par plusieurs emprunts au fil du temps
    public function emprunts(): HasMany
    {
        return $this->hasMany(related: Emprunt::class);
    }
}
