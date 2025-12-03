<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'destinatary',
        'signeds',
        'status',
        'user_id',
        'category_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function signers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'petition_user')
            ->withTimestamps();
    }
    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }
}
