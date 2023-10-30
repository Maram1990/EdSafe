<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ['slug','title','content',];

    public $timestamp=true;

    public function Image(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
