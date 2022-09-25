<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hash extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
        'file',
    ];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }
}
