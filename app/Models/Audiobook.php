<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audiobook extends Model
{
    use HasFactory;
    protected $table = 'audiobooks';

    protected $fillable = [
        'book_id',
        'bookspeaker',
        'audio',
        'featured',
    ];



    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
