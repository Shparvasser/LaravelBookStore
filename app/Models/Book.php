<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function setTitleAtribute($title)
    {
        $this->attributes['slug'] = $this->uniqueSlug($title);
        return $this->attributes['slug'];
    }
    public function uniqueSlug($title)
    {
        $slug = Str::slug($title, '-');
        $count = Book::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}
