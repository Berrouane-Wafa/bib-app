<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Emprunt extends Model
{
    use HasFactory;
    protected $fillable = [
        'livre_id', 
        'client_id', 
        'date_emprunt', 
        'date_retour_prevue', 
        'date_retour_reelle'
    ];

    // L'emprunt concerne un livre précis
    public function livre(): BelongsTo
    {
        return $this->belongsTo(Livre::class);
    }

    // L'emprunt appartient à un client précis
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
