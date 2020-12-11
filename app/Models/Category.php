<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =['name','slug'];

    // A categy has many jobs. We set the OnToMany Relationshiop
    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
