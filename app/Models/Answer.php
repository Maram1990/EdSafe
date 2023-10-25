<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'title',
        'istrue',
        ];
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
