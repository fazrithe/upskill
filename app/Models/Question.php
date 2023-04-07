<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'tryout_id',
        'user_id',
        'question',
        'answare',
        'type',
        'publish'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
