<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Marriage extends Model
{

    use HasFactory, softDeletes;

    protected $fillable = [

        'husband_id',
        'wife_id',
        'date'
    ];

    protected $casts = [
        
        'date'
    ];

    public function member() : HasMany
       {
        return $this->hasMany(Member::class);
       }    
}
