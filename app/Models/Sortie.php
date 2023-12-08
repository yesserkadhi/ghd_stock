<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
    	'quantite',
    	'prix',
        'date',
        'user_id'
    ];
    
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
