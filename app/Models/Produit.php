<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
    	'libelle',
    	'stock'
    ];
    
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function entrees()
    {
    	return $this->hasMany(Entree::class);
    }

    public function sorties()
    {
    	return $this->hasMany(Sortie::class);
    }

}
