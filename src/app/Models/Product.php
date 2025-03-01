<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'condition', 'price', 'image_path'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_user')->withTimestamps();
    }
    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    public function comments(): HasMany // ✅ 正しい型指定
    {
        return $this->hasMany(Comment::class);
    }


}
