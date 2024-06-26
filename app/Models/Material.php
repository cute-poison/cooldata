<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description']; // Define fillable fields

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
