<?php

namespace App\Models;

use App\Observers\FashionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([FashionObserver::class])]
class Fashion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'content'];

    public function scopeActive(Builder $query): void {
        $query->where('active', true); 
    }

    public function comments():HasMany{
        return $this->hasMany(Comment::class);
    }

    public function total_comments(){
        return $this->comments()->count();
    }

    protected static function booted()
    {
        // static::creating(function (Fashion $fashion){
        //     $fashion->title = 'Jodi4';
        // });
    }
}
