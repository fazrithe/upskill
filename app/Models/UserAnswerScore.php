<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerScore extends Model
{
    use HasFactory;
    protected $fillable = [
        'tryout_id',
        'user_id',
        'score'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
