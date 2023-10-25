<?php

namespace App\Models;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'questiontext' , 'imgpath',
];

        public function answer(): HasMany
    {
        return $this->hasMany(Answer::class );

    }
}
