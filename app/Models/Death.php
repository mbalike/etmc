<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Death extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [

        'full_name',
        'date_of_death'
    ];

    protected $casts = [

        'date_of_death' => 'date'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTO(Member::class);
    }
}
