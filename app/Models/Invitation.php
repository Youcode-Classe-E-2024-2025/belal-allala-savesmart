<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Family;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_id',
        'code',
        'email',
        'permissions',
        'expires_at',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }
}
