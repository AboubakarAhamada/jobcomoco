<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    
    public $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'cv_path',
        'job_id'
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
