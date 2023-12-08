<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nom',
        'user_id'
    ];
    
    //protected $primaryKey = 'categorieId';

    public function produits()
    {
    	return $this->hasMany(Produit::class);
    }
}
