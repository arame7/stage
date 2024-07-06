<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'cv',
        'user_id',
        'offre_id',
        'status',
    ];

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
