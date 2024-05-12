<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['fashion_id', 'comment'];

    public function fashion(): BelongsTo{
        return $this->belongsTo(Fashion::class);
    }
}
