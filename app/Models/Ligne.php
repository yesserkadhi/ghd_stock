<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'entree_id',
    	'quantite',
    	'prix',
        'date',
        'user_id'
    ];
    
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function entree()
    {
        return $this->belongsTo(Entree::class);
    }
}
