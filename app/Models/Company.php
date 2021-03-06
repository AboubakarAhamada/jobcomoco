<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'location',
        'phone',
        'email',
        'logo',
        'website'
    ];

    // Company can have many jobs, we nedd to set the OnToMany revrese relationship
    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
