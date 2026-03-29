<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends User
{
    use HasFactory;

    protected $fillable = ['number'];
     /**
     * Get the phone that owns the comment.
     */
    //Não precisa ter os 2 métodos, mas é bom ter os 2 para usar depois no controller
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}