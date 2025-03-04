<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $casts = [
        'date' => 'date', // Cela convertira automatiquement la colonne en Carbon
    ];
    use HasFactory;

    // Dans le modèle Revenue
    

    protected $fillable = [
        'user_id',
        'family_id', 
        'amount',
        'description',
        'date',
        'category_id', // Utilisez category_id
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}