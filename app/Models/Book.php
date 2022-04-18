<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Node\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Book extends Model
{
    use HasFactory;
    
    protected $table = 'books';

    protected $fillable = [
        'cover_image',
        'title',
        'slug',
        'edition',
        'auther',
        'publisher',
        'bcopies',
        'published_at',
        'featured',
        'category_id',
    ];



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function borrow(): BelongsTo
    {
        return $this->belongsTo(borrow::class);
    }
    



    public static function searchBook($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('auther', 'like', '%' . $search . '%');
    }

    public function scopeCategory(Builder $query, string $category): Builder
    {
        return $query->where('category_id', $category);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', new \DateTime());
    }

    public function scopeRecentAsc(Builder $query): Builder
    {
        return $query->orderBy('title', 'asc');
    }

    public function scopeRecentDesc(Builder $query): Builder
    {
        return $query->orderBy('title', 'desc');
    }
}
