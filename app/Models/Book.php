<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    /**
     * categories
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

    /**
     * user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * comments
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rating::class);
    }


    /**
     * setTitleAttribute
     *
     * @param  string $title
     * @return void
     */
    public function setTitleAttribute(string $title): void
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = $this->uniqueSlug($title);
    }


    /**
     * uniqueSlug
     *
     * @param  string $title
     * @return string
     */
    public function uniqueSlug(string $title): string
    {
        $slug = Str::slug($title, '-');
        $count = Book::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';

        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}
