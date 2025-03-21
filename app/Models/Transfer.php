<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'full_name',
        'phone',
        'gender',
        'reason',
        'description',
        'supervisor_id'

    ];

    public function supervisor(): BelongsTo
     {
        return $this->BelongsTo(User::class);
     }

}
