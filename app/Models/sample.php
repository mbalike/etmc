<?php

// app/Models/Family.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'head_id'
    ];

    // Relationship with family head
    public function head()
    {
        return $this->belongsTo(Member::class, 'head_id');
    }

    // Relationship with all family members
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}

// app/Models/Member.php
namespace App\Models;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'birthdate',
        'gender',
        'marital_status',
        'spouse_id',
        'family_id',
        'supervisor_id'
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    // Relationship with spouse (self-referential)
    public function spouse()
    {
        return $this->belongsTo(Member::class, 'spouse_id');
    }

    // Inverse relationship for spouse
    public function spouseOf()
    {
        return $this->hasOne(Member::class, 'spouse_id');
    }

    // Relationship with family
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    // Relationship for being head of a family
    public function headOfFamily()
    {
        return $this->hasOne(Family::class, 'head_id');
    }

    // Relationship with supervisor (user)
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}

// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationship with supervised members
    public function supervisedMembers()
    {
        return $this->hasMany(Member::class, 'supervisor_id');
    }
}