<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $keyType = 'string';
    public $incrementing = false;


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(fn ($category) => $category->id = (string) Str::uuid());
    }
}
