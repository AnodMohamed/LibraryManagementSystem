<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reversion extends Model
{
    use HasFactory;

    
    protected $table = 'reversions';

    protected $fillable = [
        'received_date',
        'fine',
    ];
    public static function searchFine($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%');

    }

}
