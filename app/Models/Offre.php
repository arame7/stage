<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'entreprise',
        'date_limite',
        'user_id',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidature()
    {
        return $this->hasMany(Candidature::class);
    }

}
