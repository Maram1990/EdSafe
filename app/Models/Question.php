<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\QuestionCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'questiontext' , 'imgpath', 'question_category_id'
];

        public function answer(): HasMany
    {
        return $this->hasMany(Answer::class );

    }

    public function questioncategory(): BelongsTo
    {
        return $this->belongsTo(QuestionCategory::class,  'question_category_id');
    }

    //return $this->belongsTo(QuestionCategory::class) doesn`t work when load index blade becuase when we add new colomn for relationship
    // we just add $table unsigned in the migration file , we must add: $table->foreign('category_id', 'category_fk_9440643')->references('id')->on('questionscategories');
}
