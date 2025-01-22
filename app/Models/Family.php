<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'family_head'
    ];

    public function head(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'family_head');
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}