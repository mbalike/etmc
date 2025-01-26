<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teenager extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthdate',
        'father_id',
        'mother_id',
        'supervisor_id'
    ];

    public function father(): BelongsTo
      {
        return $this->BelongsTo(Member::class, 'father_id');
      }


    public function mother(): BelongsTo
      {
        return $this->BelongsTo(Member::class, 'mother_id');
      }

    public function supervisor(): BelongsTo 
    
      {
        return $this->BelongsTo(User::class, 'supervisor_id');
      }

    
}