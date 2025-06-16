<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{
    use HasFactory;
    
    protected $table = 'jobs_listing';
    protected $fillable = ['title', 'salary'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
