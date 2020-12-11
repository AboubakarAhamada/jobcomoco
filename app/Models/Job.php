<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'id_category',
        'id_company',
        'title',
        'experience',
        'description',
        'location'
    ];

    // A job belon to one categoy, here we set the The OnToMany reverse relationship.
    public function categoy(){
        return $this->belongsTo(Category::class);
    }

    // A job belong alse to one company

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
