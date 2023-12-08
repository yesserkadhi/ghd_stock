<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    use HasFactory;
    protected $table = 'entrees';

    protected $fillable = [
        'num_be',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function lignes()
    {
        return $this->hasMany(Ligne::class);
    }
    
  
}
