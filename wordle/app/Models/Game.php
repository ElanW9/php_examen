<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Game extends Model
{
    use HasFactory;
    protected $fillable = ['word', 'status'];

    public function guesses()
    {
        return $this->hasMany(Guess::class);
    }
}
