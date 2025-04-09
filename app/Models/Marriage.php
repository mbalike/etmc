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
        'wed_by',
        'marriage_date'
    ];

    protected $casts = [
        
        'date'
    ];

    public function husband() : BelongsTo
       {
         return $this->BelongsTo(User::class,'husband_id');
       } 
       
    public function wife() : BelongsTo
       {
         return $this->BelongsTo(User::class,'wife_id');
       }

    
}
